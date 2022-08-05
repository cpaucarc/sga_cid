<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return view('docente.index');
    }

    public function show($codigo)
    {
        return view('docente.show', compact('codigo'));
    }

    public function registrar()
    {
        return view('docente.formulario-registrar-docente');
    }

    public function editar($codgio)
    {
        return view('docente.formulario-editar-docente', compact('codgio'));
    }

    public function idiomas($codigo)
    {
        return view('docente.formulario-agregar-idioma', compact('codigo'));
    }
}
