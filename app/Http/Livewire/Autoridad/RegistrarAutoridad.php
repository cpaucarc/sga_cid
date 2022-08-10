<?php

namespace App\Http\Livewire\Autoridad;

use App\Constants\Constants;
use App\Models\Autoridad;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Provincia;
use Carbon\Carbon;
use Livewire\Component;

class RegistrarAutoridad extends Component
{
    public $apellido_paterno, $apellido_materno, $nombres, $dni;
    public $celular, $correo, $fecha_nacimiento, $sexos = null, $sexo = 1;
    public $paises = null, $pais = 177, $departamentos = null, $departamento = 0;
    public $provincias = null, $provincia = 0, $distritos = null, $distrito = 0;
    public $autoridad_cargos = null, $cargo = 0;

    protected $rules = [
        'apellido_paterno' => 'required|string|max:35',
        'apellido_materno' => 'required|string|max:35',
        'nombres' => 'required|string|max:35',
        'dni' => 'required|string|min:8|max:8|unique:personas,dni',
        'correo' => 'required|email',
        'celular' => 'required|string|min:9|max:11',
        'fecha_nacimiento' => 'required|date|before:now',
        'sexo' => 'required|gt:0',
        'pais' => 'required|gt:0',
        'cargo' => 'required|gt:0',
    ];

    public function mount()
    {
        $this->fecha_nacimiento = Carbon::now()->sub(18, 'year')->format('Y-m-d');
        $this->sexos = Constants::sexos()->pluck('nombre', 'id')->all();
        $this->paises = Pais::query()->select('id', 'nombre')->orderBy('nombre')->get();

        $this->departamentos = Departamento::query()->where('pais_id', $this->pais)->orderBy('nombre')->get();
        $this->departamento = 2;
        $this->provincias = Provincia::query()->where('departamento_id', $this->departamento)->orderBy('nombre')->get();
        $this->distritos = collect();

        $this->autoridad_cargos = Constants::autoridad_cargos()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        return view('livewire.autoridad.registrar-autoridad');
    }

    public function updatedPais()
    {
        $this->departamentos = Departamento::query()->select('id', 'nombre')
            ->where('pais_id', $this->pais)->orderBy('nombre')->get();
        $this->departamento = 0;
        $this->provincias = null;
        $this->provincia = 0;
        $this->distritos = null;
        $this->distrito = 0;
    }

    public function updatedDepartamento()
    {
        $this->provincias = Provincia::query()->select('id', 'nombre')
            ->where('departamento_id', $this->departamento)->orderBy('nombre')->get();
        $this->provincia = 0;
        $this->distritos = null;
        $this->distrito = 0;
    }

    public function updatedProvincia()
    {
        $this->distritos = Distrito::query()->select('id', 'nombre')
            ->where('provincia_id', $this->provincia)->orderBy('nombre')->get();
        $this->distrito = 0;
    }

    public function registrarAutoridad()
    {
        $this->validate();

        if ($this->pais == 177) {
            $this->validate([
                'departamento' => 'required|gt:0',
                'provincia' => 'required|gt:0',
                'distrito' => 'required|gt:0',
            ]);
        }

        try {
            // Registrar persona
            $persona = Persona::query()->where('dni', $this->dni)->first();
            if (!$persona) {
                $persona = Persona::create([
                    'dni' => $this->dni,
                    'apellido_paterno' => $this->apellido_paterno,
                    'apellido_materno' => $this->apellido_materno,
                    'nombres' => $this->nombres,
                    'celular' => $this->celular,
                    'correo' => $this->correo,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'sexo_id' => $this->sexo,
                    'pais_id' => $this->pais,
                    'distrito_id' => $this->distrito == 0 ? null : $this->distrito,
                ]);
            }

            // Registrar autoridad
            $autoridad = Autoridad::query()->whereHas('persona', function ($query) {
                $query->where('dni', $this->dni);
            })->first();
            if (!$autoridad) {
                Autoridad::create([
                    'esta_activo' => true,
                    'autoridad_cargo_id' => $this->cargo,
                    'persona_id' => $persona->id,
                ]);
                $msg = 'Autoridad registrado correctamente.';
            } else {
                $msg = 'Autoridad ya existe en registro.';
            }
            $this->emit('guardado', $msg);
            return redirect()->route('autoridad.index');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
