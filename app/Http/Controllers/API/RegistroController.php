<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Transformers\APITransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\GrupoPersonas;

class RegistroController extends Controller
{

    public function grupos(Request $request)
    {
        $documento = $request->get("documento");

        $equipo = Grupo::select("tbl_grupo.id")
        ->join("tbl_grupo_persona", "tbl_grupo_persona.grupo_id", "=", "tbl_grupo.id")
        ->join("tbl_persona", "tbl_persona.id", "=", "tbl_grupo_persona.persona_id")
        ->where("tbl_persona.documento", $documento)
        ->first();

        if($equipo == null){
            return (new APITransformer)->transform(["ok" => false, "mensaje" => 'Sin equipo']);
        }

        $equipos = Grupo::select("tbl_persona.documento", "tbl_persona.foto", "tbl_persona.nombres", "tbl_persona.apellidos", "tbl_persona.correo_principal", "tbl_persona.telefono", "tbl_centro.nombre_centro", "tbl_regional.nombre_regional")
        ->join("tbl_grupo_persona", "tbl_grupo_persona.grupo_id", "=", "tbl_grupo.id")
        ->join("tbl_persona", "tbl_persona.id", "=", "tbl_grupo_persona.persona_id")
        ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
        ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
        ->where("tbl_grupo.id", $equipo->id)
        ->where("tbl_persona.documento", "<>", $documento)
        ->get();

        return (new APITransformer)->transform(["ok" => true, "datos" => $equipos]);
    }


    public function puntaje($categoria_id){

        $grupos = Grupo::select("*", \DB::raw("0 as puntaje"))
        ->with("grupoxpersonas", "grupoxpersonas.Persona")
        ->where("categoria_id", $categoria_id)
        ->orderBy("tbl_grupo.id")
        ->get();

        return (new APITransformer)->transform(["ok" => true, "datos" => $grupos]);
    }
}
