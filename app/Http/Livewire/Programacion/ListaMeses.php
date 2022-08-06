<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use Carbon\Carbon;
use Livewire\Component;

class ListaMeses extends Component
{
    public $meses, $anio_actual, $clase_modalidades;
    public $open = false;
    public $datos_mes;

    public function mount($meses, $year, $clase_modalidades)
    {
        $this->meses = $meses;
        $this->anio_actual = $year;
        $this->clase_modalidades = $clase_modalidades;
    }

    public function render()
    {
        $mensuales = Mensual::query()
            ->where('anio', $this->anio_actual)
            ->orderBy('esta_activo', 'desc')
            ->orderBy('mes_id', 'desc')
            ->get();
        return view('livewire.programacion.lista-meses', compact('mensuales'));
    }

    public function activar($mensual_id)
    {
        Mensual::where('id', '<>', $mensual_id)->update(['esta_activo' => false]);
        Mensual::where('id', '=', $mensual_id)->update(['esta_activo' => true]);
        $this->emitTo('programacion.info-programacion', 'render');
        $this->emitTo('programacion.programacion-sidebar', 'render');
    }

    public function mostrarInfo($mensual_id)
    {
        $this->datos_mes = Mensual::find($mensual_id);
        $this->open = true;
    }
}
