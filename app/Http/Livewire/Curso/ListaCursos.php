<?php

namespace App\Http\Livewire\Curso;

use App\Constants\Constants;
use App\Models\Curso;
use App\Models\Idioma;
use App\Models\IdiomaDictable;
use App\Models\Modalidad;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class ListaCursos extends Component
{
    public $dictable = null, $requisito = null;
    public $ciclos = null;
    public $niveles = null, $nivel = 0;
    public $idioma_nombre = "";
    public $modalidades = null, $modalidad = 0;

    public $listeners = ['generarCursosAutomaticamente', 'render'];

    public function mount($id = 1)
    {
        $this->dictable = IdiomaDictable::query()->find($id);
        if (!is_null($this->dictable) && !is_null($this->dictable->requisito)) {
            $this->requisito = IdiomaDictable::query()->where('codigo', $this->dictable->requisito)->first();
        }

        $this->ciclos = Constants::ciclos()->pluck('nombre', 'id')->all();
        $this->niveles = Constants::idioma_niveles()->pluck('nombre', 'id')->all();
        $this->idioma_nombre = Idioma::query()->find($this->dictable->idioma_id)->nombre;

        $this->modalidad = Modalidad::query()->find($this->dictable->modalidad_id);

    }

    public function render()
    {
        $cursos = Curso::query();

        if (!is_null($this->dictable)) {
            $cursos = $cursos->where('idioma_dictable_id', $this->dictable->id);
        }

        $cursos = $cursos->get();

        return view('livewire.curso.lista-cursos', compact('cursos'));
    }

    public function generarCursosAutomaticamente($aforo = 25)
    {
        $modalidad = $this->dictable->modalidad_id;
        $duracion_meses = $this->modalidades[$modalidad]['duracion_meses'];
        $id_inicial = $modalidad == 3 ? 10 : 0; // 3: Acelerado

        $cursos_generados = [];
        $codigo = substr(Str::uuid(), 0, 8);

        if (!is_null($this->requisito)) { // Tiene un idioma dictable como requisito
            $req = Curso::where('idioma_dictable_id', $this->requisito->id)->orderBy('ciclo_id', 'desc')->first()->codigo;
        } else {
            $req = null;
        }

        for ($i = ($id_inicial + 1); $i <= ($id_inicial + $duracion_meses); $i++) {
            $cursos_generados[] = [
                'codigo' => $codigo,
                'requisito' => $req,
                'ciclo_id' => $i,
                'aforo_maximo' => $aforo,
                'idioma_dictable_id' => $this->dictable->id
            ];
            $req = $codigo;
            $codigo = substr(Str::uuid(), 0, 8);
        }

        Curso::insert($cursos_generados);

        Log::info('Generando cursos', [
            'modalidad' => $modalidad,
            'meses' => $duracion_meses,
            'cursos_generados' => $cursos_generados,
        ]);

        $this->emit('guardado', count($cursos_generados) . ' cursos generados automaticamente.');
    }

    public function agregarCurso()
    {
        $this->emitTo('curso.agregar-curso', 'abrirModalNuevo');
    }

    public function editarCurso($c)
    {
        $this->emitTo('curso.agregar-curso', 'abrirModalEditar', ['curso' => $c]);
    }

}
