<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    public $table = "tbl_proyecto";
    public $timestamps = true;

    public function Centro() {
        return $this->hasOne(Centro::class,'id', 'centro_id');
    }
}
