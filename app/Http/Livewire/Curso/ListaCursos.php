<?php

namespace App\Http\Livewire\Curso;

use App\Constants\Constants;
use App\Models\Curso;
use App\Models\Idioma;
use App\Models\IdiomaDictable;
use App\Models\Modalidad;
use Livewire\Component;

class ListaCursos extends Component
{
    public $dictable = null, $dictable_id = null, $requisito = null;
    public $ciclos = null;
    public $niveles = null, $nivel = 0;
    public $idiomas = null, $idioma = 1;
    public $modalidades = null, $modalidad = 0;

    public function mount($id = null)
    {
        $this->dictable_id = $id;
        $this->ciclos = Constants::ciclos()->pluck('nombre', 'id')->all();
        $this->niveles = Constants::idioma_niveles()->pluck('nombre', 'id')->all();
        $this->idiomas = Idioma::query()->orderBy('nombre')->get()->pluck('nombre', 'id')->all();
        $this->modalidades = Modalidad::query()->orderBy('nombre')->get()->pluck('nombre', 'id')->all();

        $this->dictable = IdiomaDictable::query()->find($id);

        if (!is_null($this->dictable) && !is_null($this->dictable->requisito)) {
            $this->requisito = IdiomaDictable::query()->where('codigo', $this->dictable->requisito)->first();
        }

    }

    public function render()
    {
        $cursos = Curso::query();

        if (!is_null($this->dictable_id)) {
            $cursos = $cursos->where('idioma_dictable_id', $this->dictable_id);
        }

        $cursos = $cursos->get();

        return view('livewire.curso.lista-cursos', compact('cursos'));
    }
}
