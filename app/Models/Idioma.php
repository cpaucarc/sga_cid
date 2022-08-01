<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    public $table = 'idiomas';
    public $timestamps = false;
    public $fillable = ['codigo', 'nombre'];
}
