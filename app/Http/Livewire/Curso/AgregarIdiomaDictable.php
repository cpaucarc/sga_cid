<?php

namespace App\Http\Livewire\Curso;

use App\Models\IdiomaDictable;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AgregarIdiomaDictable extends Component
{
    public $open = false;
    public $titulo = "123";
    public $niveles = [], $nivel = 0;
    public $idiomas = [], $idioma = 1;
    public $modalidades = [], $modalidad = 0;

    public $editar = false;
    public $dictable_actual = null;
    public $precio = 0;

    public $listeners = ['abrirModalEditar'];

    public function mount($niveles, $idiomas, $modalidades)
    {
        $this->niveles = $niveles;
        $this->idiomas = $idiomas;
        $this->modalidades = $modalidades;
    }

    public function render()
    {
        return view('livewire.curso.agregar-idioma-dictable');
    }

    public function abrirModalEditar(IdiomaDictable $dictable)
    {
        $this->dictable_actual = $dictable;
        $this->editar = true;
        $this->idioma = $this->dictable_actual->idioma_id;
        $this->nivel = $this->dictable_actual->idioma_nivel_id;
        $this->modalidad = $this->dictable_actual->modalidad_id;
        $this->precio = $this->dictable_actual->precio_mensual;
        $this->titulo = "Editar información del idioma";
        $this->open = true;
    }

    public function guardarDictable()
    {
        if ($this->editar){
            $this->dictable_actual->precio_mensual = $this->precio;
            $this->dictable_actual->save();
            $this->emit('guardado', 'El curso fue modificado correctamente.');
        }

        $this->reset('open', 'editar', 'precio', 'dictable_actual');
        $this->emitTo('curso.lista-idiomas-dictables', 'render');
    }
}
