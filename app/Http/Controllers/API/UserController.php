<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Grupo; 
use App\Models\Persona; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function grupos($documento)
    {

        $equipo = Grupo::select("tbl_grupo.id")
        ->join("tbl_grupo_persona", "tbl_grupo_persona.grupo_id", "=", "tbl_grupo.id")
        ->join("tbl_persona", "tbl_persona.id", "=", "tbl_grupo_persona.persona_id")
        ->where("tbl_persona.documento", $documento)
        ->first();

        if($equipo == null){
            return null;
        }

        $equipos = Grupo::select("tbl_persona.documento", "tbl_persona.foto", "tbl_persona.nombres", "tbl_persona.apellidos", "tbl_persona.correo_principal", "tbl_persona.telefono", "tbl_centro.nombre_centro", "tbl_regional.nombre_regional")
        ->join("tbl_grupo_persona", "tbl_grupo_persona.grupo_id", "=", "tbl_grupo.id")
        ->join("tbl_persona", "tbl_persona.id", "=", "tbl_grupo_persona.persona_id")
        ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
        ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
        ->where("tbl_grupo.id", $equipo->id)
        ->where("tbl_persona.documento", "<>", $documento)
        ->get();

        return $equipos;
    }
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request)
    {

        $mensajes = [
            'required' => 'El :attribute es requerido'
        ];
       
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ],$mensajes);

        if ($validator->fails()) {
            return response()->json([
                'mensajes' => $validator->errors(),
                'ok' => false
            ]); 
        }
   
        $data = [
            'email' => $request->get('email'),
            'password'  =>  $request->get('password')
        ];

        if(Auth::attempt($data))
        {
            $user = Auth::user();
            $persona = Persona::where("documento", $user->documento)
            ->join("tbl_centro", "tbl_persona.centro_id", "=", "tbl_centro.id")
            ->join("tbl_categoria", "tbl_persona.categoria_id", "=", "tbl_categoria.id")
            ->join("tbl_regional", "tbl_centro.regional_id", "=", "tbl_regional.id")
            ->first();

            // the $user->createToken('appName')->accessToken generates the JWT token that we can use 
            return response()->json([
                'ok' => true,
                'user'  =>  $user, // <- we're sending the user info for frontend usage
                'persona' => $persona,
                'equipo' => $this->grupos($user->documento),
                'token' =>  $user->createToken('senasoft')->accessToken // <- token is generated and sent back to the front end
            ]);
        }
        else
        {
            return response()->json([
                "ok"=>false, 
                "mensaje"=>"Datos erróneos, verifique e intente nuevamente."], 401);
        }
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
   
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
  
}
