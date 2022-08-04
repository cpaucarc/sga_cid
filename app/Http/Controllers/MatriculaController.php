<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function prematricula_director()
    {
        return view('matricula.prematricula-director');
    }
}
