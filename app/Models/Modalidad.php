<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    public $table = 'modalidades';
    public $timestamps = false;
    public $fillable = ['nombre'];
}
