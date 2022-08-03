<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramacionController extends Controller
{
    public function index()
    {
        return view('programacion.index');
    }

    public function crearMensual()
    {
        return view('programacion.formulario-crear-mensuales');
    }

    public function prematricula()
    {
        return view('programacion.prematricula');
    }

    public function matricula()
    {
        return view('programacion.matricula');
    }
}
