<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Refrigerio;
use App\Models\TipoRefrigerio;
use App\Models\Usref;
use App\Http\Controllers\API\Transformers\APITransformer;
class RefrigerioController extends Controller
{
    
    function comprobarRefrigerio(Request $request){
        //Obtener usuario y refrigerio
		$ok=null;
        $mensaje = null;
        
        $user = Persona::select('tbl_persona.*')->where('documento', $request->cedula)->first();
		if($user == null){
			$ok = false;
            $mensaje  = 'El usuario no se ha encontrado en la base de datos';
            return (new APITransformer)->transform(["ok"=>$ok, "datos"=>$mensaje]);
        }
        
        $refrigerio = Refrigerio::select('tbl_refrigerio.*')->whereRaw('? between fecha_inicial AND fecha_final', [now()])->first();
        //Comprobar si el usuario ya reclamo o no
		if($refrigerio == null){
			
			$ok = false;
            $mensaje  = 'En este horario no hay un refrigerio programado';
            return (new APITransformer)->transform(["ok"=>$ok, "datos"=>$mensaje]);
        }

        if($user->tipo_contrato == 'PLANTA' && $refrigerio->tipo_ref_id == 3){		
			$ok = false;
            $mensaje  = 'A los instructores de PLANTA no se les asigno almuerzo';
            return (new APITransformer)->transform(["ok"=>$ok, "datos"=>$mensaje]);
        }
		
        $us_ref = Usref::where('persona_id', $user->id)->where('refrigerios_id', $refrigerio->id)->first();
		
        //Comprobar el tipo de refrigerio
        $tipo_refrigerio = TipoRefrigerio::select('tbl_tipo_refrigerio.*')->where('id', $refrigerio->tipo_ref_id)->first();
        //Validacion
        if(is_null($us_ref) || empty($us_ref)){
            
            $newData_us_ref = new Usref;
            $newData_us_ref->persona_id = $user->id;
            $newData_us_ref->refrigerios_id = $refrigerio->id;
            $newData_us_ref->estado = 1;
            $newData_us_ref->save();
            return (new APITransformer)->transform(["ok"=>true, "datos"=>'El ' . $tipo_refrigerio->tipo .' se ha registrado correctamente.']);

        } else{
            return (new APITransformer)->transform(["ok"=>false, "datos"=>'ya ha reclamado el '. $tipo_refrigerio->tipo]);
        
        }
    }
}