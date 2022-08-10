<?php

namespace App\Http\Livewire\Programacion;

use App\Constants\Constants;
use App\Models\Mensual;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CrearMensuales extends Component
{
    public $modalidades = null, $modalidad = 1;
    public $meses = null, $mes = null, $anio = null;
    public $ultimo_mensual = null;

    public $fecha_inicio, $fecha_fin;
    public $inicio_prematricula, $fin_prematricula;
    public $inicio_matricula, $fin_matricula;
    public $inicio_pago, $fin_pago;
    public $inicio_revision, $fin_revision;
    public $inicio_validacion, $fin_validacion;

    protected $rules = [
        'fecha_inicio' => 'required|date|before:fecha_fin',
        'fecha_fin' => 'required|date|after:fecha_inicio',
        'modalidad' => 'required|gt:0',
    ];

    public function mount()
    {
        $this->ultimo_mensual = Mensual::query()->orderBy('anio', 'desc')->orderBy('mes_id', 'desc')->first();
        $this->meses = Constants::meses()->pluck('nombre', 'id')->all();
        $this->modalidades = Constants::clase_modalidades()->pluck('nombre', 'id')->all();
        $this->modalidad = Constants::clase_modalidades()->first()['id'];

        if ($this->ultimo_mensual) {
//            $this->mes = $this->meses[Carbon::parse($this->fecha_inicio)->month];
            $this->anio = $this->ultimo_mensual->mes_id == 12 ? ($this->ultimo_mensual->anio + 1) : $this->ultimo_mensual->anio;
            $this->mes = $this->ultimo_mensual->mes_id == 12 ? 1 : ($this->ultimo_mensual->mes_id + 1);
        } else {
            $this->anio = now()->year;
            $this->mes = now()->month;
        }

        $mes_a_crear = Carbon::now()->month($this->mes);

        $this->fecha_inicio = $mes_a_crear->startOfMonth()->format('Y-m-d');
        $this->fecha_fin = $mes_a_crear->endOfMonth()->format('Y-m-d');

        $this->inicio_prematricula = Carbon::parse($this->fecha_inicio)->subWeek()->format('Y-m-d');
        $this->fin_prematricula = Carbon::parse($this->inicio_prematricula)->add(2, 'day')->format('Y-m-d');
        $this->inicio_matricula = Carbon::parse($this->fin_prematricula)->add(1, 'day')->format('Y-m-d');
        $this->fin_matricula = Carbon::parse($this->fecha_inicio)->subDay()->format('Y-m-d');
        $this->inicio_pago = $this->inicio_prematricula;
        $this->fin_pago = $this->fin_matricula;
        $this->inicio_revision = $this->fecha_inicio;
        $this->fin_revision = Carbon::parse($this->inicio_revision)->add(2, 'day')->format('Y-m-d');
        $this->inicio_validacion = $this->inicio_revision;
        $this->fin_validacion = Carbon::parse($this->fecha_inicio)->addWeek()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.programacion.crear-mensuales');
    }

    public function updatedFechaInicio()
    {
        $this->fecha_fin = Carbon::parse($this->fecha_inicio)->endOfMonth()->format('Y-m-d');
        $this->mes = Carbon::parse($this->fecha_inicio)->month;
    }

    public function crear()
    {
        $this->validate();
        try {
            $mensual = Mensual::query()->where('mes_id', Carbon::parse($this->fecha_inicio)->month)->first();
            Mensual::where('id', '<>', '0')->update(['esta_activo' => false]);
            if (!$mensual) {
                Mensual::create([
                    'inicio_clases' => $this->fecha_inicio,
                    'fin_clases' => $this->fecha_fin,
                    'inicio_prematricula' => $this->inicio_prematricula,
                    'fin_prematricula' => $this->fin_prematricula,
                    'inicio_matricula' => $this->inicio_matricula,
                    'fin_matricula' => $this->fin_matricula,
                    'inicio_pago' => $this->inicio_pago,
                    'fin_pago' => $this->fin_pago,
                    'inicio_revision' => $this->inicio_revision,
                    'fin_revision' => $this->fin_revision,
                    'inicio_validacion' => $this->inicio_validacion,
                    'fin_validacion' => $this->fin_validacion,
                    'esta_activo' => true,
                    'anio' => $this->anio,
                    'clase_modalidad_id' => $this->modalidad,
                    'mes_id' => $this->mes
                ]);
                $msg = 'Creado con éxito.';
            } else {
                $mensual->update([
                    'inicio_clases' => $this->fecha_inicio,
                    'fin_clases' => $this->fecha_fin,
                    'inicio_prematricula' => $this->inicio_prematricula,
                    'fin_prematricula' => $this->fin_prematricula,
                    'inicio_matricula' => $this->inicio_matricula,
                    'fin_matricula' => $this->fin_matricula,
                    'inicio_pago' => $this->inicio_pago,
                    'fin_pago' => $this->fin_pago,
                    'inicio_revision' => $this->inicio_revision,
                    'fin_revision' => $this->fin_revision,
                    'inicio_validacion' => $this->inicio_validacion,
                    'fin_validacion' => $this->fin_validacion,
                    'esta_activo' => true,
                    'anio' => $this->anio,
                    'clase_modalidad_id' => $this->modalidad,
                    'mes_id' => $this->mes
                ]);
                $msg = 'Actualizado con éxito.';
            }
            $this->emit('guardado', $msg);
            return redirect()->route('director.matricula.programacion', ['year' => $this->anio, 'month' => $this->mes]);
        } catch (\Exception $e) {
            $this->emit('error', "Hubo un error inesperado: \n" . $e);
        }
    }
}
