<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Porcentaje extends Model
{
    public $table = 'tbl_porcentaje';

    protected $fillable = [
        'fase_id',
        'categoria_id',
        'porcentaje'
    ];
}
