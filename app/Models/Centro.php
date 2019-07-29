<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    public $table = "tbl_centro";

    //protected  $fillable = ['codigo','estado_proyectos', 'estado_equipos', 'estado_registros'];
    protected $guarded = ['id'];

    public function Regional() {
        return $this->hasOne(Regional::class,'id', 'regional_id');
    }
}
