<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangoPago extends Model
{
    use HasFactory;

    protected $table = 'rango_pagos';
    public $timestamps = false;
    protected $guarded = ['id'];
}
