<?php

namespace App\Http\Livewire\Docente;

use App\Models\Docente;
use Livewire\Component;

class ListaDocentes extends Component
{
    public $esta_activo = 0;

    public function render()
    {
        $docentes = Docente::query()
            ->with('persona')
            ->withCount('idiomas');

        if (!$this->esta_activo) {
            $docentes = $docentes->where('esta_activo', true);
        }
        $docentes = $docentes->get();

        return view('livewire.docente.lista-docentes', compact('docentes'));
    }
}
