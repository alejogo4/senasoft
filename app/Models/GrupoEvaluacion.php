<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoEvaluacion extends Model
{
    public $table = "tbl_grupo_evaluacion";

    protected $fillable = [
        'nombre_jurado',
        'categoria_id',
        'grupo_id',
        'fase_id',
        'puntaje',
        'adjunto'
    ];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
    public function fase()
    {
        return $this->belongsTo(Fase::class, 'fase_id');
    }

    
}
