<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silabo extends Model
{
    use HasFactory;

    protected $table = 'silabos';
    public $timestamps = false;
    protected $guarded = ['id'];
}
