<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaDictableRequisito extends Model
{
    use HasFactory;

    protected $table = 'idioma_dictable_requisitos';
    public $timestamps = false;
    protected $guarded = ['id'];
}
