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
    public $codigo, $docente, $meses;
    public $distrito, $provincia, $departamento, $pais;
    public $dedicacion, $categoria, $condicion;

    public function mount($codigo)
    {
        $this->codigo = $codigo;
        $this->docente = Docente::query()
            ->with('persona')
            ->where('codigo', $this->codigo)
            ->first();

        $this->pais = Pais::find($this->docente->persona->pais_id);
        $this->distrito = Distrito::find($this->docente->persona->distrito_id);
        if ($this->distrito) {
            $this->provincia = Provincia::find($this->distrito->provincia_id);
            $this->departamento = Departamento::find($this->provincia->departamento_id);
        }

        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();

        $this->dedicacion = Constants::docente_dedicacion()->pluck('nombre', 'id')->all();
        $this->categoria = Constants::docente_categorias()->pluck('nombre', 'id')->all();
        $this->condicion = Constants::docente_condicion()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $this->docente = Docente::query()
            ->with('persona')
            ->where('codigo', $this->codigo)
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
