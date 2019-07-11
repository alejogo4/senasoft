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
        $topProyectos = Proyecto::where('estado',0)->orderBy('puntaje', 'desc')->take($cantidadDeProyectos)->get();
        return (new APITransformer)->transform(["ok"=>true, "datos"=>$topProyectos]);
    }

}
