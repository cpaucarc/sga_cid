<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    public $fillable = ['codigo', 'dni', 'apellido_paterno', 'apellido_materno', 'nombres', 'celular', 'correo', 'fecha_nacimiento', 'sexo_id', 'distrito_id'];
}
