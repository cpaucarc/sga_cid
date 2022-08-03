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

    public $casts = ['fecha_inicio_clases' => 'date', 'fecha_fin_clases' => 'date'];
}
