<?php

namespace App\Models;

use App\Constants\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function dictable()
    {
        return $this->belongsTo(IdiomaDictable::class, 'idioma_dictable_id', 'id');
    }

    public static function nombre_completo($id)
    {
        $curso = Curso::find($id);
        $dictable = IdiomaDictable::with('idioma', 'modalidad')->find($curso->idioma_dictable_id);
        $nivel = Constants::idioma_niveles()->where('id', $dictable->idioma_nivel_id)->first()['nombre'];
        $ciclo = Constants::ciclos()->where('id', $curso->ciclo_id)->first()['nombre'];

        return $dictable->idioma->nombre . ' ' . $nivel . ' ' . $dictable->modalidad->nombre . ' ' . $ciclo;
    }
}
