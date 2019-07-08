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
}
