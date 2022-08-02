<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    use HasFactory;

    protected $table = 'autoridades';
    public $timestamps = false;
    public $fillable = ['esta_activo', 'autoridad_cargo_id', 'persona_id'];
}
