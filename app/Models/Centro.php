<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    public $table = "tbl_centro";

    protected  $fillable = ['estado_proyectos', 'estado_equipos', 'estado_registros'];
}
