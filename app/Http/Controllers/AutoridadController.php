<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoridadController extends Controller
{
    public function index()
    {
        return view('autoridad.index');
    }
}
