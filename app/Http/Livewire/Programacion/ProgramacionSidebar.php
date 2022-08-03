<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Matricula;
use App\Models\Mensual;
use App\Models\Prematricula;
use App\Models\RangoPago;
use Carbon\Carbon;
use Livewire\Component;

class ProgramacionSidebar extends Component
{
    public $meses;
    public $prematricula, $matricula, $pago;

    public $listeners = ['render'];

    public function mount()
    {
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $mensual = Mensual::where('esta_activo', true)->first();
        if ($mensual) {
            $this->prematricula = Prematricula::where('mensual_id', $mensual->id)->first();
            $this->matricula = Matricula::where('mensual_id', $mensual->id)->first();
            $this->pago = RangoPago::where('mensual_id', $mensual->id)->first();
        }
        return view('livewire.programacion.programacion-sidebar');
    }
}
