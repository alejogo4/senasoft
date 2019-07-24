<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $table = "tbl_equipo";

     protected $fillable = [
        'equipo',
        'descripcion',
        'descripcion_actual',
        'modelo',
        'serial',
        'atributos',
        'placa_sena',
        'esp_tecnica',
        'categoria_id',
        'centro_id'];

        public function Centro() {
            return $this->hasOne('App\Models\Centro','id');
        }
    
        public function Regional() {
            return $this->hasOne('App\Models\Regional','id');
        }
        public function Categoria() {
            return $this->hasOne('App\Models\Categoria', 'id');
        }
}

