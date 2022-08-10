<?php

namespace App\Http\Livewire\Docente;

use App\Constants\Constants;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Docente;
use App\Models\Pais;
use App\Models\Provincia;
use Livewire\Component;

class EditarDocente extends Component
{
    public $codigo, $docente;
    public $anio, $codigo_cid, $nuevo_codigo, $ultimo_codigo;
    public $apellido_paterno, $apellido_materno, $nombres, $dni;
    public $celular, $correo, $fecha_nacimiento, $sexos = null, $sexo = 1;
    public $paises = null, $pais = 0, $departamentos = null, $departamento = 0;
    public $provincias = null, $provincia = 0, $distritos = null, $distrito = 0;
    public $dedicaciones = null, $dedicacion = 1, $categorias = null, $categoria = 1;
    public $condiciones = null, $condicion = 1;

    public $distrito_docente, $provincia_docente, $departamento_docente;

    protected $rules = [
        'apellido_paterno' => 'required|string|max:35',
        'apellido_materno' => 'required|string|max:35',
        'nombres' => 'required|string|max:35',
        'correo' => 'required|email',
        'celular' => 'required|string|min:9|max:11',
        'fecha_nacimiento' => 'required|date|before:now',
        'sexo' => 'required|gt:0',
        'pais' => 'required|gt:0',
        'dedicacion' => 'required|gt:0',
        'categoria' => 'required|gt:0',
        'condicion' => 'required|gt:0',
    ];

    public function mount($codigo)
    {
        $this->codigo = $codigo;
        $this->docente = Docente::query()
            ->with('persona')
            ->where('codigo', $this->codigo)
            ->first();

        $this->apellido_paterno = $this->docente->persona->apellido_paterno;
        $this->apellido_materno = $this->docente->persona->apellido_materno;
        $this->nombres = $this->docente->persona->nombres;
        $this->dni = $this->docente->persona->dni;
        $this->celular = $this->docente->persona->celular;
        $this->correo = $this->docente->persona->correo;
        $this->fecha_nacimiento = $this->docente->persona->fecha_nacimiento->format('Y-m-d');

        $this->sexos = Constants::sexos()->pluck('nombre', 'id')->all();
        $this->sexo = $this->docente->persona->sexo_id;


        $this->paises = Pais::query()->select('id', 'nombre')->orderBy('nombre')->get();
        $this->pais = Pais::find($this->docente->persona->pais_id)->id;

        $this->departamentos = Departamento::query()->select('id', 'nombre')
            ->where('pais_id', $this->pais)->orderBy('nombre')->get();

        if ($this->docente->persona->distrito_id) {
            //Seleccionar
            $this->distrito_docente = Distrito::find($this->docente->persona->distrito_id);
            $this->distrito = $this->distrito_docente->id;

            $this->provincia_docente = Provincia::find($this->distrito_docente->provincia_id);
            $this->provincia = $this->provincia_docente->id;

            $this->departamento_docente = Departamento::find($this->provincia_docente->departamento_id);
            $this->departamento = $this->departamento_docente->id;

            //Listar
            $this->provincias = Provincia::query()->select('id', 'nombre')
                ->where('departamento_id', $this->departamento)->orderBy('nombre')->get();

            $this->distritos = Distrito::query()->select('id', 'nombre')
                ->where('provincia_id', $this->provincia)->orderBy('nombre')->get();
        } else {
            $this->provincias = collect();
            $this->distritos = collect();
        }


        $this->dedicaciones = Constants::docente_dedicacion()->pluck('nombre', 'id')->all();
        $this->categorias = Constants::docente_categorias()->pluck('nombre', 'id')->all();
        $this->condiciones = Constants::docente_condicion()->pluck('nombre', 'id')->all();

        $this->dedicacion = $this->docente->docente_dedicacion_id;
        $this->categoria = $this->docente->docente_categoria_id;
        $this->condicion = $this->docente->docente_condicion_id;
    }

    public function render()
    {
        return view('livewire.docente.editar-docente');
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

    public function actualizarDocente()
    {
        $this->validate();
        try {
            $this->docente->persona->update([
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
            $this->docente->update([
                'docente_condicion_id' => $this->condicion,
                'docente_dedicacion_id' => $this->dedicacion,
                'docente_categoria_id' => $this->categoria,
            ]);
            $msg = 'Docente actualizado.';
            $this->emit('guardado', $msg);
            return redirect()->route('docente.index');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
