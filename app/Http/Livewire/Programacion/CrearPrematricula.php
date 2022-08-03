<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use App\Models\Prematricula;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CrearPrematricula extends Component
{
    public $fecha_inicio, $fecha_fin;
    public $mensual;

    protected $rules = [
        'fecha_inicio' => 'required|date|before:fecha_fin',
        'fecha_fin' => 'required|date|after:fecha_inicio',
    ];

    public function mount()
    {
        $this->mensual = Mensual::where('esta_activo', true)->first();
        if ($this->mensual) {
            $this->fecha_inicio = $this->mensual->fecha_inicio_clases->format('Y-m-d');
        } else {
            $this->fecha_inicio = Carbon::now()->startOfMonth()->format('Y-m-d');
        }
        $this->fecha_fin = Carbon::parse($this->fecha_inicio)->add(5, 'day')->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.programacion.crear-prematricula');
    }

    public function crear()
    {
        $this->validate();
        try {

            Prematricula::create([
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'mensual_id' => $this->mensual->id
            ]);
            $msg = 'Fecha de prematricula programado correctamente';
            $this->emit('guardado', ['titulo' => 'Programación', 'mensaje' => $msg]);
            return redirect()->route('programacion.prematricula');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
