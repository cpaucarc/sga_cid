<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CrearMensuales extends Component
{
    public $fecha_inicio, $fecha_fin;
    public $modalidades = null, $modalidad = 0;
    public $meses = null, $mes = null;
    public $prueba;

    protected $rules = [
        'fecha_inicio' => 'required|date|before:fecha_fin',
        'fecha_fin' => 'required|date|after:fecha_inicio',
        'modalidad' => 'required|gt:0',
    ];

    public function mount()
    {
        $this->fecha_inicio = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->fecha_fin = Carbon::parse($this->fecha_inicio)->add(31, 'day')->format('Y-m-d');

        $this->modalidades = Constants::clase_modalidades()->pluck('nombre', 'id')->all();
        $this->modalidad = Constants::clase_modalidades()->first()['id'];

        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->mes = $this->meses[Carbon::parse($this->fecha_inicio)->month];
    }

    public function render()
    {
        return view('livewire.programacion.crear-mensuales');
    }

    public function updatedFechaInicio()
    {
        $this->fecha_fin = Carbon::parse($this->fecha_inicio)->add(31, 'day')->format('Y-m-d');
        $this->mes = $this->meses[Carbon::parse($this->fecha_inicio)->month];
    }

    public function crear()
    {
        $this->validate();
        try {
            $mensual = Mensual::query()->where('mes_id', Carbon::parse($this->fecha_inicio)->month)->first();
            Mensual::where('id', '<>', '0')->update(['esta_activo' => false]);
            if (!$mensual) {
                Mensual::create([
                    'fecha_inicio_clases' => $this->fecha_inicio,
                    'fecha_fin_clases' => $this->fecha_fin,
                    'esta_activo' => true,
                    'anio' => Carbon::parse($this->fecha_inicio)->year,
                    'clase_modalidad_id' => $this->modalidad,
                    'mes_id' => Carbon::parse($this->fecha_inicio)->month
                ]);
            } else {
                $mensual->update([
                    'fecha_inicio_clases' => $this->fecha_inicio,
                    'fecha_fin_clases' => $this->fecha_fin,
                    'esta_activo' => true,
                    'anio' => Carbon::parse($this->fecha_inicio)->year,
                    'clase_modalidad_id' => $this->modalidad,
                    'mes_id' => Carbon::parse($this->fecha_inicio)->month
                ]);
            }
            $msg = 'Mes creado satisfactoriamente, ahora puede activar y programar eventos.';
            $this->emit('guardado', ['titulo' => 'Programación', 'mensaje' => $msg]);
            return redirect()->route('programacion.mensual.index');
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
