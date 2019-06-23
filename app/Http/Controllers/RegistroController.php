<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;
use Excel;
use App\Imports\AprendicesImport;

class RegistroController extends Controller
{
    public function validar_codigo($codigo){

        if($codigo != null){

            $centro = Centro::where("codigo", $codigo)
            ->where("estado_registros", 0)
            ->join("tbl_regional", "tbl_centro.regional_id", "=", "tbl_regional.id")
            ->first();

            if($centro != null){
                session(["codigo" => $codigo, "centro"=>$centro->nombre_centro, "regional"=>$centro->nombre_regional]);
                return response()->json(["ok"=>true]);
            }else{
                return response()->json(["ok"=>false, "mensaje"=>"El código no existe o ya fue utilizado"]);
            }

        }else{
            return response()->json(["ok"=>false, "mensaje"=>"Debes ingresar un código"]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session("codigo") == null){
            return redirect("/");
        }
        return view("web.registro.index");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = Excel::toArray(new AprendicesImport, request()->file('aprendices'));

        dd($array);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
