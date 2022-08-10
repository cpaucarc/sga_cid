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
    public $anio_correlativo, $ultimo_codigo_docente_cid, $nuevo_codigo_numerico, $codigo_docente_final;
    public $apellido_paterno, $apellido_materno, $nombres, $dni;
    public $celular, $correo, $fecha_nacimiento, $sexos = null, $sexo = 1;
    public $paises = null, $pais = 177, $departamentos = null, $departamento = 0;
    public $provincias = null, $provincia = 0, $distritos = null, $distrito = 0;
    public $dedicaciones = null, $dedicacion = 1, $categorias = null, $categoria = 1;
    public $condiciones = null, $condicion = 1;

    protected $rules = [
        'apellido_paterno' => 'required|string|max:35',
        'apellido_materno' => 'required|string|max:35',
        'nombres' => 'required|string|max:35',
        'dni' => 'required|string|min:8|max:8|unique:personas,dni',
        'correo' => 'required|email|unique:personas,correo',
        'celular' => 'required|string|min:9|max:11',
        'fecha_nacimiento' => 'required|date|before:now',
        'sexo' => 'required|gt:0',
        'pais' => 'required|gt:0',
        'dedicacion' => 'required|gt:0',
        'categoria' => 'required|gt:0',
        'condicion' => 'required|gt:0',
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

    public function generarCodigo()
    {
        $this->anio_correlativo = substr(strval(now()->year), 2, 2);
        $this->ultimo_codigo_docente_cid = Constants::$ultimo_codigo_docente;
        $lista_docentes = Docente::query()->select('codigo')->orderBy('codigo', 'desc')->get();
        $docente = Docente::query()->whereHas('persona', function ($query) {
            $query->where('dni', $this->dni);
        })->first();

        $codigos_docente_bd = [];

        if ($lista_docentes) {
            if (!$docente) {
                foreach ($lista_docentes as $docente) {
                    array_push($codigos_docente_bd, explode('-', $docente->codigo)[1]);
                }

                $lista_numeros = [];
                $lista_anios = [];

                foreach ($codigos_docente_bd as $codigo) {
                    array_push($lista_anios, intval(explode('.', $codigo)[0]));
                    array_push($lista_numeros, intval(explode('.', $codigo)[2]));
                }
                $anio_correlativo = max($lista_anios);
                $numero_correlativo = max($lista_numeros);

                if ($this->anio_correlativo == $anio_correlativo)
                    $this->nuevo_codigo_numerico = $anio_correlativo . '.2.' . str_pad(($numero_correlativo + 1), 3, '0', STR_PAD_LEFT);
                else {
                    $this->nuevo_codigo_numerico = $this->anio_correlativo . '.2.001';
                }
            }
        } else {
            if ($this->anio_correlativo == explode('.', $this->ultimo_codigo_docente_cid)[0])
                $this->nuevo_codigo_numerico = explode('.', $this->ultimo_codigo_docente_cid)[0] . '.2.' . str_pad((intval(explode('.', $this->ultimo_codigo_docente_cid)[2]) + 1), 3, '0', STR_PAD_LEFT);
            else {
                $this->nuevo_codigo_numerico = $this->anio_correlativo . '.2.001';
            }
        }
        $inicial_apellido_paterno = substr(strval($this->apellido_paterno), 0, 1);
        $inicial_apellido_materno = substr(strval($this->apellido_materno), 0, 1);
        $inicial_apellido_nombres = substr(strval($this->nombres), 0, 1);
        $this->codigo_docente_final = $inicial_apellido_paterno . $inicial_apellido_materno . $inicial_apellido_nombres . '-' . $this->nuevo_codigo_numerico;
        $this->emit('guardado', $this->codigo_docente_final);
    }

    public function registrarDocente()
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
            $this->generarCodigo();
            // Registrar persona
            $existe_persona = Persona::query()->where('dni', $this->dni)->exists();
            if (!$existe_persona) {
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

            // Registrar informacion CID
            $docente = Docente::query()->whereHas('persona', function ($query) {
                $query->where('dni', $this->dni);
            })->first();
            if (!$docente) {
                Docente::create([
                    'codigo' => strtoupper($this->codigo_docente_final),
                    'esta_activo' => true,
                    'docente_categoria_id' => $this->categoria,
                    'docente_condicion_id' => $this->condicion,
                    'docente_dedicacion_id' => $this->dedicacion,
                    'persona_id' => $persona->id,
                ]);
                $msg = 'Docente registrado correctamente.';
            } else {
                $msg = 'Docente ya existe en registro.';
            }
            $this->emit('guardado', $msg);
            return redirect()->route('docente.index');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
