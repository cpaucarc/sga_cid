<?php

namespace App\Http\Livewire\Docente;

use App\Models\Docente;
use Livewire\Component;

class AgregarIdioma extends Component
{
    public $uuid;
    public $docente;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->docente = Docente::query()
            ->with('persona')
            ->where('uuid', $this->uuid)
            ->first();
    }

    public function render()
    {
        return view('livewire.docente.agregar-idioma');
    }
}
