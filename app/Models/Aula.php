<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public $table = 'aulas';
    public $timestamps = false;
    public $fillable = ['nombre', 'ambiente_id'];
}
