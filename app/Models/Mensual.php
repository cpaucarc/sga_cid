<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensual extends Model
{
    use HasFactory;

    protected $table = 'mensuales';
    public $timestamps = false;
    protected $guarded = ['id'];

    public $casts = [
        'inicio_clases' => 'date', 'fin_clases' => 'date',
        'inicio_matricula' => 'date', 'fin_matricula' => 'date',
        'inicio_prematricula' => 'date', 'fin_prematricula' => 'date',
        'inicio_pago' => 'date', 'fin_pago' => 'date',
        'inicio_revision' => 'date', 'fin_revision' => 'date',
        'inicio_validacion' => 'date', 'fin_validacion' => 'date'
    ];
}
