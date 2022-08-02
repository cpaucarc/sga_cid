<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormacionAcademica extends Model
{
    use HasFactory;

    protected $table = 'formacion_academica';
    public $timestamps = false;
    protected $guarded = ['id'];
}
