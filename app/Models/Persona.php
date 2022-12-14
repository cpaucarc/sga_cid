<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $guarded = ['id'];
    public $casts = ['fecha_nacimiento' => 'date'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
}
