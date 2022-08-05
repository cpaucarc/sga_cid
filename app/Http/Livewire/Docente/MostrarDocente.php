<?php

namespace App\Http\Livewire\Docente;

use App\Constants\Constants;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Docente;
use App\Models\Pais;
use App\Models\Provincia;
use Livewire\Component;

class MostrarDocente extends Component
{
    public $uuid, $docente;
    public $distrito, $provincia, $departamento, $pais;
    public $dedicacion, $categoria, $condicion;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->docente = Docente::query()
            ->with('persona')
            ->where('uuid', $this->uuid)
            ->first();
        $this->distrito = Distrito::find($this->docente->persona->distrito_id);
        $this->provincia = Provincia::find($this->distrito->provincia_id);
        $this->departamento = Departamento::find($this->provincia->departamento_id);
        $this->pais = Pais::find($this->departamento->pais_id);

        $this->dedicacion = Constants::docente_dedicacion()->pluck('nombre', 'id')->all();
        $this->categoria = Constants::docente_categorias()->pluck('nombre', 'id')->all();
        $this->condicion = Constants::docente_condicion()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $this->docente = Docente::query()
            ->with('persona')
            ->where('uuid', $this->uuid)
            ->first();
        return view('livewire.docente.mostrar-docente');
    }

    public function cambiarEstado($id, $estado)
    {
        $docente = Docente::find($id);
        $docente->esta_activo = !$estado;
        $docente->save();
    }
}
