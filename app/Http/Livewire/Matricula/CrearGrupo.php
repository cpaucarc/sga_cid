<?php

namespace App\Http\Livewire\Matricula;

use App\Models\Docente;
use App\Models\Grupo;
use App\Models\Persona;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CrearGrupo extends Component
{
    public $open = false;
    public $curso_nombre = "Ninguno", $curso_id = 0, $mensual_id = 0, $docentes = null, $docente = 0;
    public $grupo_nombre;

    public $listeners = ['abrirModal'];

    public function render()
    {
        return view('livewire.matricula.crear-grupo');
    }

    public function abrirModal($curso_nombre, $curso_id, $idioma_id, $mensual_id)
    {
        $this->curso_nombre = $curso_nombre;
        $this->curso_id = $curso_id;
        $this->mensual_id = $mensual_id;

        $this->docentes = Persona::query()
            ->whereIn('id', function ($query) use ($idioma_id) {
                $query->select('persona_id')->from('docentes')->where('esta_activo', true)
                    ->whereIn('id', function ($query2) use ($idioma_id) {
                        $query2->select('docente_id')->from('docente_idiomas')->where('idioma_id', $idioma_id);
                    });
            })->orderBy('apellido_paterno')->orderBy('apellido_materno')->orderBy('nombres')->get();

        $ultimo_grupo = DB::table('grupos')->select('nombre')
            ->where('curso_id', $curso_id)->where('mensual_id', $mensual_id)->orderBy('nombre', 'desc')->first();
        $this->grupo_nombre = "Grupo " . (is_null($ultimo_grupo) ? "1" : (intval(explode(' ', $ultimo_grupo->nombre)[1]) + 1));

        $this->open = true;
    }

    public function crearNuevoGrupo()
    {
        Grupo::create([
            'nombre' => $this->grupo_nombre,
            'mensual_id' => $this->mensual_id,
            'curso_id' => $this->curso_id,
            'docente_id' => $this->docente == 0 ? null : $this->docente
        ]);
        
        $this->reset('docente');
        $this->emit('creado', 'Se aperturó un nuevo grupo para ' . $this->curso_nombre);
        $this->emitTo('matricula.lista-prematricula-director', 'render');
        $this->open = false;
    }
}
