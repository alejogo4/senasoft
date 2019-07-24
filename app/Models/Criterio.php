<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    
    public $table = "tbl_criterio";

    protected $fillable = [
        'factor',
        'porcentaje',
        'observaciones',
        'fase_id'];

        public function Fase() {
            return $this->hasOne('App\Models\Fase', 'id');
        }
    
}
