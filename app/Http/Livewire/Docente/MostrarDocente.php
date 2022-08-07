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

        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();

        $this->dedicacion = Constants::docente_dedicacion()->pluck('nombre', 'id')->all();
        $this->categoria = Constants::docente_categorias()->pluck('nombre', 'id')->all();
        $this->condicion = Constants::docente_condicion()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $this->docente = Docente::query()
            ->with(['persona' => function ($query) {
                $query->addSelect(['pais' => Pais::query()
                    ->select('nombre')
                    ->whereColumn('id', 'personas.pais_id')
                    ->take(1)
                ]);
            }])
            ->where('codigo', $this->codigo)
            ->first();

        $this->distrito = Distrito::query()
            ->with(['provincia' => function ($query) {
                $query->addSelect(['departamento' => Departamento::query()
                    ->select('nombre')
                    ->whereColumn('id', 'provincias.departamento_id')
                    ->take(1)
                ]);
            }])
            ->find($this->docente->persona->distrito_id);

        return view('livewire.docente.mostrar-docente');
    }

    public function cambiarEstado($id, $estado)
    {
        $docente = Docente::find($id);
        $docente->esta_activo = !$estado;
        $docente->save();
    }
}
