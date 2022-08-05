<?php

namespace App\Http\Livewire\Matricula;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaMensuales extends Component
{
    public $meses = null, $mes = 0, $year;

    public function mount($mes, $meses, $year)
    {
        $this->year = $year;
        $this->meses = $meses;
        $this->mes = $mes;
    }

    public function render()
    {
        $mensuales = DB::table('mensuales')->select('id', 'mes_id')->where('anio', $this->year)->get();
        return view('livewire.matricula.lista-mensuales', compact('mensuales'));
    }

    public function updatedMes($value)
    {
        if ($value > 0) {
            return redirect()->route('matriculas.prematricula.director', ['year' => $this->year, 'month' => $value]);
        }
    }
}
