<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    use HasFactory;

    protected $table = 'autoridades';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class)
            ->orderBy('apellido_paterno')
            ->orderBy('apellido_materno');
    }
}
