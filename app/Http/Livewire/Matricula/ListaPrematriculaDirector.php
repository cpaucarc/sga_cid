<?php

namespace App\Http\Livewire\Matricula;

use App\Constants\Constants;
use App\Models\Curso;
use App\Models\Idioma;
use App\Models\Mensual;
use App\Models\Modalidad;
use App\Models\Prematriculado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaPrematriculaDirector extends Component
{
    public $anio = 0, $meses = null, $mes = 0;
    public $mensual = null;
    public $niveles = null, $nivel = 0;
    public $idiomas = null, $idioma = 1;
    public $modalidades = null, $modalidad = 0;
    public $ciclos = null;

    public function mount(Mensual $mensual, $meses)
    {
        $this->anio = now()->year;
        $this->mensual = $mensual;

        $this->meses = $meses;
        $this->ciclos = Constants::ciclos()->pluck('nombre', 'id')->all();
        $this->mes = $this->mensual->mes_id;

        $this->niveles = Constants::idioma_niveles()->pluck('nombre', 'id')->all();
        $this->idiomas = Idioma::query()->orderBy('nombre')->get()->pluck('nombre', 'id')->all();
        $this->modalidades = Modalidad::query()->orderBy('nombre')->get()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $cursos = is_null($this->mensual) ? null : Curso::query()
            ->addSelect(['prematriculados' => Prematriculado::select(DB::raw('count(*)'))
                ->whereColumn('curso_id', 'cursos.id')
                ->where('mensual_id', $this->mensual->id)
                ->take(1)
            ])
            ->with('dictable')
            ->whereHas('dictable', function ($q) {
                if ($this->idioma > 0) {
                    $q->where('idioma_id', $this->idioma);
                }
                if ($this->nivel > 0) {
                    $q->where('idioma_nivel_id', $this->nivel);
                }
                if ($this->modalidad > 0) {
                    $q->where('modalidad_id', $this->modalidad);
                }
            })
            ->get();
        return view('livewire.matricula.lista-prematricula-director', compact('cursos'));
    }

    public function buscarDatos()
    {

    }
}
