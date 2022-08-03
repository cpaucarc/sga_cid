<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use App\Models\Prematricula;
use Carbon\Carbon;
use Livewire\Component;

class MostrarPrematricula extends Component
{
    public $meses, $anio_actual;

    public function mount()
    {
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->anio_actual = Carbon::now()->year;
    }

    public function render()
    {
        $mensual = Mensual::where('esta_activo', true)->first();
        if ($mensual) {
            $prematricula = Prematricula::where('mensual_id', $mensual->id)->first();
        }
        return view('livewire.programacion.mostrar-prematricula', compact('prematricula'));
    }
}
