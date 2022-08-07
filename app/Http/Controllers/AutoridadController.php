<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoridadController extends Controller
{
    public function index()
    {
        return view('autoridad.index');
    }

    public function show($dni)
    {
        return view('autoridad.show', compact('dni'));
    }

    public function registrar()
    {
        return view('autoridad.formulario-registrar-autoridad');
    }
}
