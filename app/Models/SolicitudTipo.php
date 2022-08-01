<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudTipo extends Model
{
    use HasFactory;

    public $table = 'solicitud_tipos';
    public $timestamps = false;
    public $fillable = ['nombre', 'descripcion'];
}
