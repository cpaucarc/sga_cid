<?php

namespace App\Http\Livewire\Autoridad;

use App\Constants\Constants;
use App\Models\Autoridad;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Provincia;
use Livewire\Component;

class EditarAutoridad extends Component
{
    public $dni, $persona, $autoridad;
    public $apellido_paterno, $apellido_materno, $nombres;
    public $celular, $correo, $fecha_nacimiento, $sexos = null, $sexo = 1;
    public $paises = null, $pais = 0, $departamentos = null, $departamento = 0;
    public $provincias = null, $provincia = 0, $distritos = null, $distrito = 0;
    public $autoridad_cargos = null, $cargo = 0;

    public $distrito_autoridad, $provincia_autoridad, $departamento_autoridad;

    protected $rules = [
        'apellido_paterno' => 'required|string|max:35',
        'apellido_materno' => 'required|string|max:35',
        'nombres' => 'required|string|max:35',
        'correo' => 'required',
        'celular' => 'required|string|min:9|max:11',
        'fecha_nacimiento' => 'required|date|before:now',
        'sexo' => 'required|gt:0',
        'pais' => 'required|gt:0',
        'cargo' => 'required|gt:0',
    ];

    public function mount($dni)
    {
        $this->dni = $dni;
        $this->persona = Persona::query()->where('dni', $this->dni)->first();

        $this->autoridad = Autoridad::query()
            ->with('persona')
            ->where('persona_id', $this->persona->id)
            ->first();

        $this->apellido_paterno = $this->autoridad->persona->apellido_paterno;
        $this->apellido_materno = $this->autoridad->persona->apellido_materno;
        $this->nombres = $this->autoridad->persona->nombres;
        $this->celular = $this->autoridad->persona->celular;
        $this->correo = $this->autoridad->persona->correo;
        $this->fecha_nacimiento = $this->autoridad->persona->fecha_nacimiento->format('Y-m-d');

        $this->sexos = Constants::sexos()->pluck('nombre', 'id')->all();
        $this->sexo = $this->autoridad->persona->sexo_id;


        $this->paises = Pais::query()->select('id', 'nombre')->orderBy('nombre')->get();
        $this->pais = Pais::find($this->autoridad->persona->pais_id)->id;

        $this->departamentos = Departamento::query()->select('id', 'nombre')
            ->where('pais_id', $this->pais)->orderBy('nombre')->get();

        if ($this->autoridad->persona->distrito_id) {
            //Seleccionar
            $this->distrito_autoridad = Distrito::find($this->autoridad->persona->distrito_id);
            $this->distrito = $this->distrito_autoridad->id;

            $this->provincia_autoridad = Provincia::find($this->distrito_autoridad->provincia_id);
            $this->provincia = $this->provincia_autoridad->id;

            $this->departamento_autoridad = Departamento::find($this->provincia_autoridad->departamento_id);
            $this->departamento = $this->departamento_autoridad->id;

            //Listar
            $this->provincias = Provincia::query()->select('id', 'nombre')
                ->where('departamento_id', $this->departamento)->orderBy('nombre')->get();

            $this->distritos = Distrito::query()->select('id', 'nombre')
                ->where('provincia_id', $this->provincia)->orderBy('nombre')->get();
        } else {
            $this->provincias = collect();
            $this->distritos = collect();
        }


        $this->autoridad_cargos = Constants::autoridad_cargos()->pluck('nombre', 'id')->all();
        $this->cargo = $this->autoridad->autoridad_cargo_id;
    }

    public function render()
    {
        return view('livewire.autoridad.editar-autoridad');
    }

    public function updatedPais()
    {
        $this->departamentos = Departamento::query()->select('id', 'nombre')
            ->where('pais_id', $this->pais)->orderBy('nombre')->get();
        $this->departamento = 0;
        $this->provincia = 0;
        $this->distrito = 0;
    }

    public function updatedDepartamento()
    {
        $this->provincias = Provincia::query()->select('id', 'nombre')
            ->where('departamento_id', $this->departamento)->orderBy('nombre')->get();
        $this->provincia = 0;
        $this->distrito = 0;
    }

    public function updatedProvincia()
    {
        $this->distritos = Distrito::query()->select('id', 'nombre')
            ->where('provincia_id', $this->provincia)->orderBy('nombre')->get();
        $this->distrito = 0;
    }

    public function actualizarAutoridad()
    {
        $this->validate();
        try {
            $this->autoridad->persona->update([
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
            $this->autoridad->update([
                'autoridad_cargo_id' => $this->cargo,
            ]);
            $msg = 'Autoridad actualizado.';
            $this->emit('guardado', $msg);
            return redirect()->route('autoridad.index');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
