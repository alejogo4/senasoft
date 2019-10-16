<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoPersonas extends Model
{   
    public $table = "tbl_grupo_persona";

    public function Persona() {
        return $this->belongsTo('App\Models\Persona', 'persona_id');
    }
    public function Grupo() {
        return $this->hasOne('App\Models\Grupo', 'id');
    }

    protected $fillable = [
        'persona_id',
        'grupo_id'
    ];

}
