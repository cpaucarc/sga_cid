<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmante extends Model
{
    use HasFactory;

    protected $table = 'firmantes';
    public $timestamps = false;
    protected $guarded = ['id'];
}
