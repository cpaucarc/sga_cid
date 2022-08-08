<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prematriculado extends Model
{
    use HasFactory;

    protected $table = 'prematriculados';
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $dates = ['fecha_inscripcion'];
}
