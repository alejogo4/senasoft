<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipaje extends Model
{
    public $table = "tbl_equipaje";

    protected $fillable = ['documento', 'cantidad', 'descripcion', 'fecha_ingreso', 'fecha_salida'];

    public $timestamps = false;
}
