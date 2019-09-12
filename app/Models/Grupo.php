<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $table = "tbl_grupo";

    protected $fillable = ['nombre', 'categoria_id'];

}
