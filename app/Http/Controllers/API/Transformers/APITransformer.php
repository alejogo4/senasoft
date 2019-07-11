<?php
namespace App\Http\Controllers\API\Transformers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use League\Fractal\TransformerAbstract;

class APITransformer extends TransformerAbstract
{
    public function transform(Array $info){
        $resultado = [
            "ok" => $info["ok"]
        ];

        if(isset($info["datos"])){
            $resultado["data"] = $info["datos"];
        }

        if(isset($info["mensaje"])){
            $resultado["message"] = $info["mensaje"];
        }

        return $resultado;
    }
}