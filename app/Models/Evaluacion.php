<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    public $table = "tbl_evaluacion";

    protected $fillable = [
        'fecha',
        'nombre_lider',
        'nombre_jurado',
        'grupo_id',
        'categoria_id',
        'centro_id'];

        public function Centro() {
            return $this->hasOne('App\Models\Centro','id');
        }
    
        public function Categoria() {
            return $this->hasOne('App\Models\Categoria', 'id');
        }
    
        public function Grupo() {
            return $this->hasOne('App\Models\Grupo', 'id');
        }
}
