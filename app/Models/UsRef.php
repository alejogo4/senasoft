<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Usref extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'usuarios_id' ,'refrigerios_id', 'estado'
    ];
    protected $table = 'tbl_us_ref';
}