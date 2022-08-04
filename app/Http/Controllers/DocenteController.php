<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return view('docente.index');
    }

    public function registrar()
    {
        return view('docente.formulario-registrar-docente');
    }
}
