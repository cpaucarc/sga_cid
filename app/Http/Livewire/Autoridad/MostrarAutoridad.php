<?php

namespace App\Http\Livewire\Autoridad;

use App\Constants\Constants;
use App\Models\Autoridad;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Pais;
use App\Models\Persona;
use Livewire\Component;

class MostrarAutoridad extends Component
{
    public $dni, $persona, $autoridad, $meses;
    public $distrito, $pais, $autoridad_cargos;

    public function mount($dni)
    {
        $this->dni = $dni;
        $this->persona = Persona::query()->where('dni', $this->dni)->first();

        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->autoridad_cargos = Constants::autoridad_cargos()->pluck('nombre', 'id')->all();
    }

    public function render()
    {
        $this->autoridad = Autoridad::query()
            ->with(['persona' => function ($query) {
                $query->addSelect(['pais' => Pais::query()
                    ->select('nombre')
                    ->whereColumn('id', 'personas.pais_id')
                    ->take(1)
                ]);
            }])
            ->where('persona_id',$this->persona->id)
            ->first();

        $this->distrito = Distrito::query()
            ->with(['provincia' => function ($query) {
                $query->addSelect(['departamento' => Departamento::query()
                    ->select('nombre')
                    ->whereColumn('id', 'provincias.departamento_id')
                    ->take(1)
                ]);
            }])
            ->find($this->autoridad->persona->distrito_id);
        return view('livewire.autoridad.mostrar-autoridad');
    }

    public function cambiarEstado($id, $estado)
    {
        $autoridad = Autoridad::find($id);
        $autoridad->esta_activo = !$estado;
        $autoridad->save();
    }

    public function cambiarCargo($id, $cargo_id)
    {
        $autoridad = Autoridad::find($id);
        $autoridad->autoridad_cargo_id = $cargo_id;
        $autoridad->save();
    }
}
