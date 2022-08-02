<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    use HasFactory;

    protected $table = 'enlaces';
    public $timestamps = false;
    protected $guarded = ['id'];
}
