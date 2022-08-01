<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaDictableRequisito extends Model
{
    use HasFactory;

    public $table = 'idioma_dictable_requisitos';
    public $timestamps = false;
    public $fillable = ['esta_activo', 'solicitud_tipo_id','requisito_id','idioma_dictable_id'];
}
