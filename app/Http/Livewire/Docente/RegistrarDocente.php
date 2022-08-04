<?php

namespace App\Http\Livewire\Docente;

use App\Constants\Constants;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Docente;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Provincia;
use Carbon\Carbon;
use Livewire\Component;

class RegistrarDocente extends Component
{
    public $anio, $codigo_cid, $nuevo_codigo, $ultimo_codigo;
    public $apellido_paterno, $apellido_materno, $nombres, $dni;
    public $celular, $correo, $fecha_nacimiento, $sexos = null, $sexo = 1;
    public $paises = null, $pais = 0, $departamentos = null, $departamento = 0;
    public $provincias = null, $provincia = 0, $distritos = null, $distrito = 0;
    public $dedicaciones = null, $dedicacion = 1, $categorias = null, $categoria = 1;
    public $condiciones = null, $condicion = 1;


    protected $rules = [
        'apellido_paterno' => 'required|string|max:35',
        'apellido_materno' => 'required|string|max:35',
        'nombres' => 'required|string|max:35',
        'dni' => 'required|string|min:8|max:8',
        'correo' => 'required',
        'celular' => 'required|string|min:9|max:11',
        'fecha_nacimiento' => 'required|date|before:now',
        'sexo' => 'required|gt:0',
        'pais' => 'required|gt:0',
        'departamento' => 'required|gt:0',
        'provincia' => 'required|gt:0',
        'distrito' => 'required|gt:0',
        'dedicacion' => 'required|gt:0',
        'categoria' => 'required|gt:0',
        'condicion' => 'required|gt:0',
    ];

    public function mount()
    {
        $this->fecha_nacimiento = Carbon::now()->sub(18, 'year')->format('Y-m-d');
        $this->sexos = Constants::sexos()->pluck('nombre', 'id')->all();
        $this->paises = Pais::query()->select('id', 'nombre')->orderBy('nombre')->get();

        $this->departamentos = collect();
        $this->provincias = collect();
        $this->distritos = collect();

        $this->dedicaciones = Constants::docente_dedicacion()->pluck('nombre', 'id')->all();
        $this->categorias = Constants::docente_categorias()->pluck('nombre', 'id')->all();
        $this->condiciones = Constants::docente_condicion()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        return view('livewire.docente.registrar-docente');
    }

    public function updatedPais()
    {
        $this->departamentos = Departamento::query()->select('id', 'nombre')
            ->where('pais_id', $this->pais)->orderBy('nombre')->get();
        $this->departamento = 0;
    }

    public function updatedDepartamento()
    {
        $this->provincias = Provincia::query()->select('id', 'nombre')
            ->where('departamento_id', $this->departamento)->orderBy('nombre')->get();
        $this->provincia = 0;
    }

    public function updatedProvincia()
    {
        $this->distritos = Distrito::query()->select('id', 'nombre')
            ->where('provincia_id', $this->provincia)->orderBy('nombre')->get();
        $this->distrito = 0;
    }

    public function generarCodigo()
    {
        $this->anio = now()->year;
        $this->codigo_cid = Constants::$utimo_codigo_cid;
        $persona = Persona::query()->select('codigo')->orderBy('codigo', 'desc')->first();
        if ($persona) {
            if (substr(strval($this->anio), 2, 2) == explode('.', $persona->codigo)[0])
                $this->nuevo_codigo = explode('.', $persona->codigo)[0] . '.1.' . str_pad((intval(explode('.', $persona->codigo)[2]) + 1), 4, '0', STR_PAD_LEFT);
            else {
                $this->nuevo_codigo = substr(strval($this->anio), 2, 2) . '.1.0001';
            }
        } else {
            if (substr(strval($this->anio), 2, 2) == explode('.', $this->codigo_cid)[0])
                $this->nuevo_codigo = explode('.', $this->codigo_cid)[0] . '.1.' . str_pad((intval(explode('.', $this->codigo_cid)[2]) + 1), 4, '0', STR_PAD_LEFT);
            else {
                $this->nuevo_codigo = substr(strval($this->anio), 2, 2) . '.1.0001';
            }
        }
    }

    public function registrarDocente()
    {
        $this->validate();
        try {
            $this->generarCodigo();
            // Registrar persona
            $persona = Persona::create([
                'codigo' => $this->nuevo_codigo,
                'dni' => $this->dni,
                'apellido_paterno' => $this->apellido_paterno,
                'apellido_materno' => $this->apellido_materno,
                'nombres' => $this->nombres,
                'celular' => $this->celular,
                'correo' => $this->correo,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'distrito_id' => $this->distrito,
                'sexo_id' => $this->sexo,
            ]);

            // Registrar informacion CID
            Docente::create([
                'esta_activo' => true,
                'persona_id' => $persona->id,
                'docente_condicion_id' => $this->condicion,
                'docente_dedicacion_id' => $this->dedicacion,
                'docente_categoria_id' => $this->categoria,
            ]);
            $msg = 'Docente registrado.';
            $this->emit('guardado', $msg);
            return redirect()->route('docente.index');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
