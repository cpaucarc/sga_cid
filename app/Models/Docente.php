<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class)
            ->orderBy('apellido_paterno')
            ->orderBy('apellido_materno');
    }

    public function idiomas()
    {
        return $this->belongsToMany(Idioma::class,'docente_idiomas');
    }
}
