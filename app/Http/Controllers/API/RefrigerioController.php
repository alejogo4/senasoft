<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Refrigerio;
use App\Models\TipoRefrigerio;
use App\Models\Usref;
class userController extends Controller
{
    function getUser(Request $request){
        $user = tbl_usuario::all();
        return response()->json([
            'mensaje'=> $user
        ]);
    }
    function getInfoUser(Request $request){
     
        // $currentTime = date('Y-m-d H:i:s');
        $user = Persona::select('tbl_persona.*')->where('tbl_persona.cedula', $request->cedula)->first();
           
        $refrigerio = Refrigerio::select('tbl_refrigerio.*')->whereRaw('? between fecha_inicial AND fecha_final', [now()])->first();
        
        return response()->json([
            'info' => $user,
            'tipo Refri' => $refrigerio
        ]);
    }
    function comprobarRefrigerio(Request $request){
        //Obtener usuario y refrigerio
        $user = Persona::select('tbl_usuario.*')->where('cedula', $request->cedula)->first();
        $refrigerio = Refrigerio::select('tbl_refrigerio.*')->whereRaw('? between fecha_inicial AND fecha_final', [now()])->first();
        //Comprobar si el usuario ya reclamo o no
        $us_ref = Usref::select('tbl_us_ref.*')->where('usuarios_id', $user->id)->where('refrigerios_id', $refrigerio->id)->first();
        //Comprobar el tipo de refrigerio
        $tipo_refrigerio = TipoRefrigerio::select('tbl_tipo_refrigerio.*')->where('id', $refrigerio->tipo_ref_id)->first();
        //Validacion
        if(is_null($us_ref) || empty($us_ref)){
            
            $newData_us_ref = new Usref;
            $newData_us_ref->usuarios_id = $user->id;
            $newData_us_ref->refrigerios_id = $refrigerio->id;
            $newData_us_ref->estado = 1;
            $newData_us_ref->save();
            return response()->json([
                'ok' => true,
                'mensaje' => 'El ' . $tipo_refrigerio->tipo .' se ha registrado correctamente.'
            ]);
        } else{
            
            return response()->json([
                'ok' => false,
                'Mensaje' => 'ya ha reclamado el '. $tipo_refrigerio->tipo
            ]);
        }
    }
}