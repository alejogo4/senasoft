<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Refrigerio extends Model
{
    protected $table = 'tbl_refrigerio';
    protected $fillable = [
        'id', 'fecha_inicial', 'fecha_final', 'tipo_ref_id',
    ];
    
}