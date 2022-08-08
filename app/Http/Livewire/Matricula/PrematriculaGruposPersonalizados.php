<?php

namespace App\Http\Livewire\Matricula;

use App\Models\Prematriculado;
use Livewire\Component;

class PrematriculaGruposPersonalizados extends Component
{
    public $open = false;
    public $prematriculados = 0;
    public $curso_nombre = "Ninguno", $curso_id = 0, $recomendado = 0, $maximo = 0, $cant_grupos = 0, $mensual_id = 0;
    public $distribucion = [];

    public $listeners = ['abrirModal'];

    public function render()
    {
        return view('livewire.matricula.prematricula-grupos-personalizados');
    }

    public function abrirModal($curso_nombre, $curso_id, $recomendado, $maximo, $mensual_id, $cant_grupos)
    {
        $this->prematriculados = Prematriculado::query()->where('mensual_id', $mensual_id)->where('curso_id', $curso_id)
            ->where('esta_matriculado', false)->count();
        $this->curso_nombre = $curso_nombre;
        $this->curso_id = $curso_id;
        $this->recomendado = $recomendado;
        $this->maximo = $maximo;
        $this->mensual_id = $mensual_id;
        $this->cant_grupos = $cant_grupos;

        $this->open = true;
    }
}
