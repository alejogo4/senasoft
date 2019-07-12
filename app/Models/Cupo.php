<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupo extends Model
{
    public $table = "tbl_cupo";

    protected $fillable = ['n_cupos_utilizados'];

    public $timestamps = false;

    public function Categoria() {
        return $this->hasOne(Categoria::class, 'id');
    }
}
