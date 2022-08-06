<?php

namespace App\Http\Livewire\Docente;

use App\Models\Docente;
use Livewire\Component;

class ListaDocentes extends Component
{
    public $inactivo = 0;
    public $search;

    public function render()
    {
        $docentes = Docente::query()
            ->with('persona:id,dni,apellido_paterno,apellido_materno,nombres')
            ->withCount('idiomas');

        if (!$this->inactivo) {
            $docentes = $docentes->where('esta_activo', true);
        }
        if ($this->search) {
            $docentes = $docentes->whereHas('persona', function ($query) {
                $query->where('dni', 'like', '%' . $this->search . '%')
                    ->orWhere('apellido_paterno', 'like', '%' . $this->search . '%')
                    ->orWhere('apellido_materno', 'like', '%' . $this->search . '%');
            });
        }
        $docentes = $docentes->get();

        return view('livewire.docente.lista-docentes', compact('docentes'));
    }

    public function cambiarEstado($id, $estado)
    {
        $docente = Docente::find($id);
        $docente->esta_activo = !$estado;
        $docente->save();
    }
}
