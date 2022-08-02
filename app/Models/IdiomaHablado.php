<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaHablado extends Model
{
    use HasFactory;

    protected $table = 'idiomas_hablados';
    public $timestamps = false;
    protected $guarded = ['id'];
}
