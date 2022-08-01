<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaDictable extends Model
{
    use HasFactory;

    public $table = 'idiomas_dictables';
    public $timestamps = false;
    public $fillable = ['codigo', 'requisito', 'precio_mensual', 'duracion_meses', 'idioma_id', 'idioma_nivel_id', 'modalidad_id'];
}
