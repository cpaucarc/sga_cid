<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteIdioma extends Model
{
    use HasFactory;

    protected $table = 'docente_idiomas';
    public $timestamps = false;
    protected $guarded = ['id'];
}
