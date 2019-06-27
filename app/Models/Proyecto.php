<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    public $table = "tbl_proyecto";

    public function Centro () {
        return $this->hasOne('App\Models\Centro','id');
    }

    public $timestamps = true;
}
