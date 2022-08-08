<?php

namespace App\Http\Livewire\Matricula;

use App\Constants\Constants;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Idioma;
use App\Models\Matriculado;
use App\Models\Mensual;
use App\Models\Modalidad;
use App\Models\Prematriculado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ListaPrematriculaDirector extends Component
{
    public $anio = 0, $meses = null, $mes = 0;
    public $mensual = null;
    public $niveles = null, $nivel = 0;
    public $idiomas = null, $idioma = 1;
    public $modalidades = null, $modalidad = 0;
    public $ciclos = null;

    public $open = false, $curso_seleccionado = null, $estudiantes = null;
    public $tipos = null; // Tipos de estudiante

    public $listeners = ['crearGrupos'];

    public function mount(Mensual $mensual, $meses)
    {
        $this->anio = now()->year;
        $this->mensual = $mensual;

        $this->meses = $meses;
        $this->ciclos = Constants::ciclos()->pluck('nombre', 'id')->all();
        $this->mes = $this->mensual->mes_id;

        $this->tipos = Constants::estudiante_tipos()->pluck('nombre', 'id')->all();
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
            ->addSelect(['grupos_aperturados' => Grupo::select(DB::raw('count(*)'))
                ->whereColumn('curso_id', 'cursos.id')
                ->where('mensual_id', $this->mensual->id)
                ->take(1)
            ])
            ->addSelect(['sin_matricular' => Prematriculado::select(DB::raw('count(*)'))
                ->whereColumn('curso_id', 'cursos.id')
                ->where('mensual_id', $this->mensual->id)
                ->where('esta_matriculado', false)
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

    public function verEstudiantes(Curso $curso)
    {
        $this->curso_seleccionado = $curso;
        $this->estudiantes = Estudiante::query()
            ->addSelect(['fecha_inscripcion' => Prematriculado::select('fecha_inscripcion')
                ->whereColumn('estudiante_id', 'estudiantes.id')
                ->where('curso_id', $this->curso_seleccionado->id)
                ->where('mensual_id', $this->mensual->id)
                ->take(1)
            ])
            ->addSelect(['esta_matriculado' => Prematriculado::select('esta_matriculado')
                ->whereColumn('estudiante_id', 'estudiantes.id')
                ->where('curso_id', $this->curso_seleccionado->id)
                ->where('mensual_id', $this->mensual->id)
                ->take(1)
            ])
            ->whereIn('id', function ($query) {
                $query->select('estudiante_id')->from('prematriculados')
                    ->where('curso_id', $this->curso_seleccionado->id)
                    ->where('mensual_id', $this->mensual->id);
            })
            ->orderBy('fecha_inscripcion', 'desc')->get();
        $this->open = true;
    }

    // Crear la cantidad de grupos sugeridos
    public function crearGrupos($curso_id, $recomendado, $maximo, $cant_grupos = 1)
    {
        // Consultar si ya existen grupos creados, para este mes y este curso
        $grupos = Grupo::query()
            ->where('mensual_id', $this->mensual->id)
            ->where('curso_id', $curso_id)
            ->limit($cant_grupos)->pluck('id')->toArray();

        // Crear los grupos establecidos
        $grupos_faltantes = $cant_grupos - count($grupos);
        if ($grupos_faltantes > 0) {
            for ($i = 1; $i <= $grupos_faltantes; $i++) {
                $grupo_id = Grupo::create([
                    'nombre' => 'Grupo ' . $i,
                    'mensual_id' => $this->mensual->id,
                    'curso_id' => $curso_id,
                    'docente_id' => null
                ])->id;
                $grupos[] = $grupo_id;
            }
        }

        $prematriculados = Prematriculado::query()
            ->where('mensual_id', $this->mensual->id)
            ->where('esta_matriculado', false)
            ->where('curso_id', $curso_id)->pluck('estudiante_id')->toArray();
        // Insertar los estudiantes prematriculados a matriculados, usando el aforo recomendado
        $matriculados = [];
        $grupo_index = -1;
        foreach ($prematriculados as $i => $prematriculado) {

            if ($i % $recomendado == 0) {
                $grupo_index++;
            }

            $matriculados[] = [
                'fecha_inscripcion' => now(),
                'estudiante_id' => $prematriculado,
                'grupo_id' => $grupos[$grupo_index]
            ];
        }

        // Insertamos los datos en la matriculados
        if (count($matriculados) > 0) {
            Matriculado::query()->insert($matriculados);
        }

        // Asignamos la columna 'esta_matriculado' a true en la tabla de los prematriculados
        if (count($prematriculados) > 0) {
            Prematriculado::query()
                ->where('mensual_id', $this->mensual->id)
                ->where('curso_id', $curso_id)
                ->whereIn('estudiante_id', $prematriculados)->update(['esta_matriculado' => true]);
        }

        $mensaje = $grupos == 1 ? 'Se aperturó 1 grupo' : 'Se aperturaron ' . $cant_grupos . ' grupos';
        $this->emit('creado', $mensaje . ' para este curso correctamente.');
    }
}
