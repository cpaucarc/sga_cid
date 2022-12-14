<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculado extends Model
{
    use HasFactory;

    protected $table = 'matriculados';
    public $timestamps = false;
    protected $guarded = ['id'];
}
