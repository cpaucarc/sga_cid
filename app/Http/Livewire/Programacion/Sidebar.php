<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use Livewire\Component;

class Sidebar extends Component
{
    public $meses;

    public $listeners = ['render'];

    public function mount()
    {
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $mensual = Mensual::where('esta_activo', true)->first();
        return view('livewire.programacion.sidebar', compact('mensual'));
    }
}
