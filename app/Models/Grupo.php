<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $table = "tbl_grupo";

    protected $fillable = ['nombre', 'categoria_id'];

    public function grupoxpersonas()
    {
        return $this->hasMany(GrupoPersonas::class,'grupo_id');
    }
    public function fases()
    {
        return $this->hasMany(GrupoEvaluacion::class,'grupo_id');
    }

}
