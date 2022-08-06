<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}
