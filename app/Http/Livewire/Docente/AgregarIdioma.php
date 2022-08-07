<?php

namespace App\Http\Livewire\Docente;

use App\Models\Docente;
use App\Models\DocenteIdioma;
use App\Models\Idioma;
use Livewire\Component;

class AgregarIdioma extends Component
{
    public $codigo, $docente;
    public $idiomas = null, $idioma_selected;
    public $docente_idiomas, $idiomas_actuales;

    public function mount($codigo)
    {
        $this->codigo = $codigo;
        $this->docente = Docente::query()
            ->with('persona:id,apellido_paterno,apellido_materno,nombres,dni,correo')
            ->where('codigo', $this->codigo)
            ->first();
    }

    public function render()
    {
        $callback = DocenteIdioma::query()
            ->with('idioma:id,codigo,nombre')
            ->where('docente_id', $this->docente->id);

        $this->docente_idiomas = $callback->get();
        $this->idiomas_actuales = $callback->pluck('idioma_id');

        $this->idiomas = Idioma::query()
            ->whereNotIn('id', $this->idiomas_actuales)
            ->orderBy('nombre')
            ->get(['id', 'nombre']);
        return view('livewire.docente.agregar-idioma');
    }

    public function updatedIdiomaSelected()
    {
        DocenteIdioma::create([
            'docente_id' => $this->docente->id,
            'idioma_id' => $this->idioma_selected
        ]);
        $this->reset('idioma_selected');
        $this->emit('guardado', 'Idioma agregado.');
    }

    public function eliminarIdioma($docente_idioma_id)
    {
        DocenteIdioma::find($docente_idioma_id)->delete();
        $this->emit('guardado', 'Idioma quitado.');

    }
}
