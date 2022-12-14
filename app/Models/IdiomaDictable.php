<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaDictable extends Model
{
    use HasFactory;

    protected $table = 'idiomas_dictables';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class);
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
