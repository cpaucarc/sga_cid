<?php

namespace App\Http\Livewire\Curso;

use App\Constants\Constants;
use App\Models\Idioma;
use App\Models\IdiomaDictable;
use App\Models\Modalidad;
use Livewire\Component;

class ListaIdiomasDictables extends Component
{
    public $niveles = null, $nivel = 0;
    public $idiomas = null, $idioma = 1;
    public $modalidades = null, $modalidad = 0;

    public function mount()
    {
        $this->niveles = Constants::idioma_niveles()->pluck('nombre', 'id')->all();
        $this->idiomas = Idioma::query()->orderBy('nombre')->get()->pluck('nombre', 'id')->all();

        foreach (Modalidad::query()->orderBy('nombre')->get() as $mod) {
            $this->modalidades[$mod->id] = [
                'nombre' => $mod->nombre,
                'duracion_meses' => $mod->duracion_meses
            ];
        }
    }

    public function render()
    {
        $idiomas_dictables = IdiomaDictable::query()
            ->withCount('cursos');

        if ($this->idioma > 0) {
            $idiomas_dictables = $idiomas_dictables->where('idioma_id', $this->idioma);
        }
        if ($this->modalidad > 0) {
            $idiomas_dictables = $idiomas_dictables->where('modalidad_id', $this->modalidad);
        }
        if ($this->nivel > 0) {
            $idiomas_dictables = $idiomas_dictables->where('idioma_nivel_id', $this->nivel);
        }

        $idiomas_dictables = $idiomas_dictables->get();

        return view('livewire.curso.lista-idiomas-dictables', compact('idiomas_dictables'));
    }

    public function aplicarEstilo($cant, $total)
    {
        if ($cant == 0) {
            return 'btn-state-danger';
        } elseif ($cant < $total) {
            return 'btn-state-warning';
        }
        return 'btn-state-default';
    }
}
