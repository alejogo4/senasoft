<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AsignacionHotel;
use App\Http\Controllers\API\Transformers\APITransformer;

class HotelController extends Controller
{
    public function index($persona_id){

        $asignacion = AsignacionHotel::join("tbl_hotel", "tbl_hotel.id", "=", "tbl_asignacion_hotel.hotel_id")
        ->where("tbl_asignacion_hotel.persona_id", $persona_id)
        ->first();

        return (new APITransformer)->transform(["ok"=>true, "datos"=>$asignacion]);
    }

}
