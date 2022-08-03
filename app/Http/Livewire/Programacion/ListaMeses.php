<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use Carbon\Carbon;
use Livewire\Component;

class ListaMeses extends Component
{
    public $meses, $anio_actual;
    public $open = false;
    public $datos_mes;

    public function mount()
    {
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->anio_actual = Carbon::now()->year;
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
