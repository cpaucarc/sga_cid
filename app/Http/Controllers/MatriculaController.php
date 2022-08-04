<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Mensual;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function prematricula_director($year = null, $month = null)
    {
        // E1: Pasan null en ambos casos -> ir al mensual activo
        if (is_null($year) && is_null($month)) {
            $mensual_actual = Mensual::query()->where('esta_activo', true)->first();

            if (is_null($mensual_actual)) {
                abort('404');
            }

            $year = $mensual_actual->anio;
            $month = $mensual_actual->mes_id;
            return redirect()->route('matriculas.prematricula.director', ['year' => $year, 'month' => $month]);
        }

        // E2: Pasan solo el año -> buscar el ultimo mes registrado para ese año
        if (is_null($month)) {
            $mensual = Mensual::query()->where('anio', $year)->orderBy('mes_id', 'desc')->first();
            $month = $mensual ? $mensual->mes_id : 1;
            return redirect()->route('matriculas.prematricula.director', ['year' => $year, 'month' => $month]);
        }

        // E3: Pasan ambos datos, pero no hay registros -> error 404
        $mensual = Mensual::query()->where('anio', $year)->where('mes_id', $month)->first();
        if (is_null($mensual)) {
            abort('404');
        }

        $titulo = Constants::meses()->where('id', $month)->first()['nombre'] . ' de ' . $year;

        return view('matricula.prematricula-director', compact('mensual', 'titulo'));
    }
}
