<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionHotel extends Model
{
    public $table = "tbl_asignacion_hotel";

    protected $fillable = [
        'hotel_id',
        'persona_id'
    ];

    public $timestamps = false;
}
