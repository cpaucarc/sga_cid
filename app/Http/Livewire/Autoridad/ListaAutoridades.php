<?php

namespace App\Http\Livewire\Autoridad;

use App\Models\Autoridad;
use Livewire\Component;

class ListaAutoridades extends Component
{
    public $inactivo = 0;
    public $search;

    public function render()
    {
        $autoridades = Autoridad::query()
            ->with('persona:id,dni,apellido_paterno,apellido_materno,nombres,correo');

        if (!$this->inactivo) {
            $autoridades = $autoridades->where('esta_activo', true);
        }
        if ($this->search) {
            $autoridades = $autoridades->whereHas('persona', function ($query) {
                $query->where('dni', 'like', '%' . $this->search . '%')
                    ->orWhere('apellido_paterno', 'like', '%' . $this->search . '%')
                    ->orWhere('apellido_materno', 'like', '%' . $this->search . '%');
            });
        }
        $autoridades = $autoridades->get();
        return view('livewire.autoridad.lista-autoridades', compact('autoridades'));
    }
}
