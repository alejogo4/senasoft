<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
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
            // the $user->createToken('appName')->accessToken generates the JWT token that we can use 
            return response()->json([
                'ok' => true,
                'user'  =>  $user, // <- we're sending the user info for frontend usage
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
