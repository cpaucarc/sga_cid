<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return view('curso.index');
    }

    public function cursos($id = 1)
    {
        return view('curso.cursos', compact('id'));
    }
}
