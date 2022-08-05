<?php

namespace App\Http\Livewire\Docente;

use App\Models\Docente;
use Livewire\Component;

class ListaDocentes extends Component
{
    public function render()
    {
        $docentes = Docente::query()
            ->with('persona')
            ->withCount('idiomas')
            ->get();

        return view('livewire.docente.lista-docentes', compact('docentes'));
    }
}
