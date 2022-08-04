<?php

namespace App\Http\Livewire\Matricula;

use App\Models\Mensual;
use Livewire\Component;

class ListaPrematriculaDirector extends Component
{
    public $mensuales = null, $mensual = 0;
    public $anio = 0;

    public function mount()
    {
        $this->mensuales = Mensual::query()->get();
        $this->mensual = $this->mensuales->where('esta_activo', true)->first();
        $this->anio = now()->year;
    }

    public function render()
    {
        return view('livewire.matricula.lista-prematricula-director');
    }
}
