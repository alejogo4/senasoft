<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    public $table = "tbl_fecha";

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin', 
        'fase_id'];


        



}
