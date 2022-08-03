<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';
    public $timestamps = false;
    protected $guarded = ['id'];

    public $casts = ['fecha_inicio' => 'date', 'fecha_fin' => 'date'];
}
