<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Http\Controllers\API\Transformers\APITransformer;

class ProyectoController extends Controller
{
    //

    public function seleccionarTopGanadores(){
        $cantidadDeProyectos = 20;
        $topProyectos = Proyecto::select("tbl_proyecto.*","tbl_centro.nombre_centro", "tbl_regional.nombre_regional")
        ->join("tbl_centro", "tbl_centro.id", "=", "tbl_proyecto.centro_id")
        ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
        ->where('tbl_proyecto.estado',1)->orderBy('tbl_proyecto.puntaje', 'desc')->take($cantidadDeProyectos)->get();
        return (new APITransformer)->transform(["ok"=>true, "datos"=>$topProyectos]);
    }

}
