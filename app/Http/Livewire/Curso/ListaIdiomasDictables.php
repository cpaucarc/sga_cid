<?php

namespace App\Http\Livewire\Curso;

use App\Models\IdiomaDictable;
use Livewire\Component;

class ListaIdiomasDictables extends Component
{
    public function render()
    {
        $idiomas_dictables = IdiomaDictable::query()->with('idioma')->get();

        return view('livewire.curso.lista-idiomas-dictables', compact('idiomas_dictables'));
    }
}
