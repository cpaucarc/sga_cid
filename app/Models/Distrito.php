<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'distritos';
    public $timestamps = false;
    public $fillable = ['nombre', 'provincia_id'];
}