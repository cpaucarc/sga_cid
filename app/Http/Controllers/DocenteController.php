<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return view('docente.index');
    }

    public function show($uuid)
    {
        return view('docente.show', compact('uuid'));
    }

    public function registrar()
    {
        return view('docente.formulario-registrar-docente');
    }

    public function editar($uuid)
    {
        return view('docente.formulario-editar-docente', compact('uuid'));
    }

    public function idiomas($uuid)
    {
        return view('docente.formulario-agregar-idioma', compact('uuid'));
    }
}
