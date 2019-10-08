<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    public $table = "tbl_fase";

    protected $fillable = [
        'nombre',
        'estado',
        'fecha_inicio',
        'fecha_fin'
    ];
}
