<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    public $table = 'instituciones';
    public $timestamps = false;
    public $fillable = ['ruc', 'nombre', 'direccion', 'institucion_ambito_id', 'institucion_tipo_id','pais_id','user_id'];
}
