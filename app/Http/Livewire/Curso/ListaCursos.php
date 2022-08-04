<?php

namespace App\Http\Livewire\Curso;

use App\Constants\Constants;
use App\Models\Curso;
use App\Models\Idioma;
use App\Models\IdiomaDictable;
use App\Models\Modalidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class ListaCursos extends Component
{
    public $dictable = null, $requisito = null, $requisito_cursos = 0;
    public $ciclos = null;
    public $niveles = null, $nivel = 0;
    public $idioma_nombre = "";
    public $modalidades = null, $modalidad = 0;

    public $listeners = ['generarCursosAutomaticamente', 'render'];

    public function mount($id = 1)
    {
        $this->dictable = IdiomaDictable::query()->find($id);
        if (!is_null($this->dictable) && !is_null($this->dictable->requisito)) {
            $this->requisito = IdiomaDictable::query()->withCount('cursos')->where('codigo', $this->dictable->requisito)->first();
            $this->requisito_cursos = $this->requisito->cursos_count;
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
        $duracion_meses = $this->dictable->duracion_meses;
        $id_inicial = $modalidad == 3 ? 10 : 0; // 3: Acelerado

        $cursos_generados = [];
        $codigo = substr(Str::uuid(), 0, 8);

        if (!is_null($this->requisito)) { // Tiene un idioma dictable como requisito
            if ($this->requisito_cursos != $this->requisito->duracion_meses) {
                $nombre_prequisito = $this->idioma_nombre . ' ' . $this->niveles[$this->requisito->idioma_nivel_id] . ' - ' . $this->modalidad->nombre;
                $solucion = "<p style='font-size: 15px;'>Para solucionarlo, primero debe registrar los cursos del idioma pre-requisito.</p>";
                $this->emit('error', 'El idioma pre-requisito "<b>' . $nombre_prequisito . '</b>" deberia tener <b>' . $this->requisito->duracion_meses . ' cursos</b> registrados, actualmente tiene <b>' . $this->requisito_cursos . ' cursos</b>.<br><br>' . $solucion);

                return;
            }

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
