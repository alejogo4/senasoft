<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoEvaluacion extends Model
{
    public $table = "tbl_grupo_evaluacion";
    
    protected $fillable = [
        'cumple',
        'criterio_id',
        'evaluacion_id'];


        public function Criterio() {
            return $this->hasOne('App\Models\Criterio','id');
        }
    
        public function Evaluacion() {
            return $this->hasOne('App\Models\Evaluacion','id');
        }
        
}


