<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoEnviado extends Model
{
    use HasFactory;

    protected $table = 'requisitos_enviados';
    public $timestamps = false;
    protected $guarded = ['id'];
}
