<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Matricula;
use App\Models\Mensual;
use Carbon\Carbon;
use Livewire\Component;

class MostrarMatricula extends Component
{
    public $meses, $anio_actual;
    public $mensual, $matricula;

    protected $rules = [
        'fecha_inicio' => 'required|date|before:fecha_fin',
        'fecha_fin' => 'required|date|after:fecha_inicio',
    ];

    public function mount()
    {
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->anio_actual = Carbon::now()->year;

        $this->mensual = Mensual::where('esta_activo', true)->first();

        if ($this->mensual) {
            $this->fecha_inicio = $this->mensual->fecha_inicio_clases->format('Y-m-d');
            $this->fecha_fin = Carbon::parse($this->fecha_inicio)->add(5, 'day')->format('Y-m-d');
        }
    }

    public function render()
    {
        if ($this->mensual) {
            $this->matricula = Matricula::where('mensual_id', $this->mensual->id)->first();
        }
        return view('livewire.programacion.mostrar-matricula');
    }

    public function updatedFechaInicio()
    {
        $this->fecha_fin = Carbon::parse($this->fecha_inicio)->add(5, 'day')->format('Y-m-d');
    }

    public function crear()
    {
        $this->validate();
        try {

            Matricula::create([
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'mensual_id' => $this->mensual->id
            ]);
            $msg = 'Fecha de matricula programado correctamente';
            $this->emit('guardado', ['titulo' => 'Programación', 'mensaje' => $msg]);
//            return redirect()->route('programacion.prematricula');
            $this->emitTo('programacion.programacion-sidebar', 'render');

        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
