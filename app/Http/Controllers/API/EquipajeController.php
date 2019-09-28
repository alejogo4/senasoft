<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipaje;
use App\Http\Controllers\API\Transformers\APITransformer;

class EquipajeController extends Controller
{

    public function validar_ingreso($documento)
    {
        $equipaje = Equipaje::where("documento", $documento)
            ->where("fecha_salida", null)
            ->first();

        return $equipaje;
    }

    public function ingreso_equipaje(Request $request)
    {

        $input = $request->all();

        if ($this->validar_ingreso($input["documento"]) == null) {

            Equipaje::create([
                "documento" => $input["documento"],
                "cantidad" => $input["cantidad"],
                "descripcion" => $input["descripcion"],
                "fecha_ingreso" => date("Y-m-d H:i:s"),
            ]);
            return (new APITransformer)->transform(["ok" => true, "mensaje" => "Se realizo el ingreso correctamente"]);
        } else {
            return (new APITransformer)->transform(["ok" => false, "mensaje" => "La persona ya tiene un equipaje registrado"]);
        }
    }


    public function salida_equipaje(Request $request)
    {
        $input = $request->all();
        $resultado = $this->validar_ingreso($input["documento"]);

        if ($resultado != null) {

            $equipaje = Equipaje::find($resultado->id);

            $equipaje->update(["fecha_salida" => date("Y-m-d H:i:s")]);
            
            return (new APITransformer)->transform(["ok" => true, "mensaje" => "Se realizo la salida correctamente", "datos"=>$equipaje]);
        } else {
            return (new APITransformer)->transform(["ok" => false, "mensaje" => "La persona no cuenta con equipaje guardado"]);
        }
    }

    public function cantidad_equipaje_guardado(){
        $equipajes = Equipaje::where("fecha_salida", null)->count();
        return (new APITransformer)->transform(["ok" => true, "datos"=>["cantidad"=>$equipajes]]);
    }
}
