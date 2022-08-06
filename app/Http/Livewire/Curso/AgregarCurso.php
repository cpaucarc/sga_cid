<?php

namespace App\Http\Livewire\Curso;

use App\Constants\Constants;
use App\Models\Curso;
use App\Models\Idioma;
use App\Models\Modalidad;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class AgregarCurso extends Component
{
    public $open = false;
    public $editar = false;
    public $curso_actual = null;
    public $curso_ultimo = null;
    public $titulo = "";

    public $idioma_dictable_id = 0;
    public $ciclos = null, $ciclo = 1;
    public $nivel = "";
    public $idioma = "";
    public $modalidad = "";

    public $codigo = "";
    public $aforo_minimo = 15, $aforo_recomendado = 20, $aforo_maximo = 25;
    public $nombre_requisito = "Ninguno";

    public $listeners = ['abrirModalNuevo', 'abrirModalEditar'];

    protected $rules = [
      'aforo_minimo' => 'required|lte:aforo_recomendado|gte:0',
      'aforo_recomendado' => 'required|lte:aforo_maximo|gte:aforo_minimo',
      'aforo_maximo' => 'required|gte:aforo_recomendado'
    ];

    public function mount($idioma_dictable_id, $idioma, $modalidad, $nivel)
    {
        $this->ciclos = Constants::ciclos()->pluck('nombre', 'id')->all();
        $this->nivel = $nivel;
        $this->idioma_dictable_id = $idioma_dictable_id;
        $this->idioma = $idioma;
        $this->modalidad = $modalidad;
    }

    public function render()
    {
        return view('livewire.curso.agregar-curso');
    }

    public function abrirModalNuevo()
    {
        $this->editar = false;
        $this->titulo = "Agregar un nuevo curso";
        $this->codigo = substr(Str::uuid(), 0, 8);
        $this->curso_ultimo = Curso::query()->where('idioma_dictable_id', $this->idioma_dictable_id)->orderBy('ciclo_id', 'desc')->first();
        $this->ciclo = $this->curso_ultimo ? (intval($this->curso_ultimo->ciclo_id) + 1) : 1;

        $this->aforo_minimo = $this->curso_ultimo ? $this->curso_ultimo->aforo_minimo : 15;
        $this->aforo_recomendado = $this->curso_ultimo ? $this->curso_ultimo->aforo_recomendado : 20;
        $this->aforo_maximo = $this->curso_ultimo ? $this->curso_ultimo->aforo_maximo : 25;

        $this->nombre_requisito = $this->curso_ultimo ? \App\Models\Curso::nombre_completo($this->curso_ultimo->id) : 'Ninguno';
        $this->open = true;
    }

    public function abrirModalEditar(Curso $curso)
    {
        $this->curso_actual = $curso;
        $this->editar = true;
        $this->titulo = "Editar la información del curso";
        $this->codigo = $this->curso_actual->codigo;
        $this->curso_ultimo = Curso::query()->where('codigo', $this->curso_actual->requisito)->first();
        $this->ciclo = $this->curso_actual->ciclo_id;

        $this->aforo_minimo = $this->curso_ultimo ? $this->curso_ultimo->aforo_minimo : 15;
        $this->aforo_recomendado = $this->curso_ultimo ? $this->curso_ultimo->aforo_recomendado : 20;
        $this->aforo_maximo = $this->curso_ultimo ? $this->curso_ultimo->aforo_maximo : 25;

        $this->nombre_requisito = $this->curso_ultimo ? \App\Models\Curso::nombre_completo($this->curso_ultimo->id) : 'Ninguno';
        $this->open = true;
    }

    public function guardarCurso()
    {
        $this->validate();

        if ($this->editar){
            $this->curso_actual->aforo_minimo = $this->aforo_minimo;
            $this->curso_actual->aforo_recomendado = $this->aforo_recomendado;
            $this->curso_actual->aforo_maximo = $this->aforo_maximo;
            $this->curso_actual->save();
            $this->emit('guardado', 'El curso fue modificado correctamente.');
        }else{
            Curso::create([
                'codigo' => $this->codigo,
                'requisito' => $this->curso_ultimo?->codigo,
                'ciclo_id' => $this->ciclo,
                'aforo_minimo' => $this->aforo_minimo,
                'aforo_recomendado' => $this->aforo_recomendado,
                'aforo_maximo' => $this->aforo_maximo,
                'idioma_dictable_id' => $this->idioma_dictable_id,
            ]);
            $this->emit('guardado', 'El curso fue registrado correctamente.');
        }

        $this->reset('open', 'editar', 'curso_actual', 'curso_ultimo');
        $this->emitTo('curso.lista-cursos', 'render');
    }
}
