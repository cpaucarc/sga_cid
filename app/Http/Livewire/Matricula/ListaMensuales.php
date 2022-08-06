<?php

namespace App\Http\Livewire\Matricula;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaMensuales extends Component
{
    public $meses = null, $mes = 0, $year, $ruta;

    public function mount($meses, $year, $ruta = "#", $mes = null)
    {
        $this->year = $year;
        $this->meses = $meses;
        $this->mes = $mes ?? 0;
        $this->ruta = $ruta;
    }

    public function render()
    {
        $mensuales = DB::table('mensuales')->select('id', 'mes_id')->where('anio', $this->year)->orderBy('mes_id')->get();
        return view('livewire.matricula.lista-mensuales', compact('mensuales'));
    }

    public function updatedYear($value)
    {
        $this->mes = 0;
    }

    public function updatedMes($value)
    {
        if ($value > 0) {
            return redirect()->route($this->ruta, ['year' => $this->year, 'month' => $value]);
        }
    }
}
