<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use App\Models\RangoPago;
use Carbon\Carbon;
use Livewire\Component;

class MostrarPago extends Component
{
    public $meses, $anio_actual;
    public $mensual, $pagos;

    protected $rules = [
        'fecha_inicio_pago' => 'required|date|before:fecha_fin_pago',
        'fecha_fin_pago' => 'required|date|after:fecha_inicio_pago',
        'fecha_inicio_revision' => 'required|date|before:fecha_fin_revision',
        'fecha_fin_revision' => 'required|date|after:fecha_inicio_revision',
        'fecha_inicio_validacion' => 'required|date|before:fecha_fin_validacion',
        'fecha_fin_validacion' => 'required|date|after:fecha_inicio_validacion',
    ];

    public function mount()
    {
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->anio_actual = Carbon::now()->year;

        $this->mensual = Mensual::where('esta_activo', true)->first();

        if ($this->mensual) {
            $this->fecha_inicio_pago = $this->mensual->fecha_inicio_clases->sub(10, 'day')->format('Y-m-d');
            $this->fecha_fin_pago = Carbon::parse($this->fecha_inicio_pago)->add(15, 'day')->format('Y-m-d');

            $this->fecha_inicio_revision = Carbon::parse($this->fecha_fin_pago)->add(1, 'day')->format('Y-m-d');
            $this->fecha_fin_revision = Carbon::parse($this->fecha_inicio_revision)->add(2, 'day')->format('Y-m-d');

            $this->fecha_inicio_validacion = Carbon::parse($this->fecha_fin_revision)->add(1, 'day')->format('Y-m-d');
            $this->fecha_fin_validacion = Carbon::parse($this->fecha_inicio_validacion)->add(2, 'day')->format('Y-m-d');
        }
    }

    public function render()
    {
        if ($this->mensual) {
            $this->pagos = RangoPago::where('mensual_id', $this->mensual->id)->first();
        }
        return view('livewire.programacion.mostrar-pago');
    }

    public function updatedFechaInicioPago()
    {
        $this->fecha_fin_pago = Carbon::parse($this->fecha_inicio_pago)->add(15, 'day')->format('Y-m-d');
    }

    public function updatedFechaInicioRevision()
    {
        $this->fecha_fin_revision = Carbon::parse($this->fecha_inicio_revision)->add(2, 'day')->format('Y-m-d');
    }

    public function updatedFechaInicioValidacion()
    {
        $this->fecha_fin_validacion = Carbon::parse($this->fecha_inicio_validacion)->add(2, 'day')->format('Y-m-d');
    }

    public function crear()
    {
        $this->validate();
        try {
            RangoPago::create([
                'fecha_inicio_estudiante' => $this->fecha_inicio_pago,
                'fecha_fin_pago' => $this->fecha_fin_pago,
                'fecha_inicio_revision' => $this->fecha_inicio_revision,
                'fecha_fin_revision' => $this->fecha_fin_revision,
                'fecha_inicio_validacion' => $this->fecha_inicio_validacion,
                'fecha_fin_validacion' => $this->fecha_fin_validacion,
                'mensual_id' => $this->mensual->id
            ]);
            $msg = 'Fecha de pagos programado correctamente';
            $this->emit('guardado', ['titulo' => 'Programación', 'mensaje' => $msg]);
//            return redirect()->route('programacion.prematricula');
            $this->emitTo('programacion.programacion-sidebar', 'render');

        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
