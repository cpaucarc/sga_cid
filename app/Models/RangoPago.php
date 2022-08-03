<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangoPago extends Model
{
    use HasFactory;

    protected $table = 'rango_pagos';
    public $timestamps = false;
    protected $guarded = ['id'];

    public $casts = [
        'fecha_inicio_estudiante' => 'date',
        'fecha_fin_pago' => 'date',
        'fecha_inicio_revision' => 'date',
        'fecha_fin_revision' => 'date',
        'fecha_inicio_validacion' => 'date',
        'fecha_fin_validacion' => 'date',
    ];
}
