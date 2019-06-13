<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("web.proyecto.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Crear la validacion del código

        $this->validateForm($request);
        

        $file = $request->file('proyecto_file');
        if($file){
            $file_name = $request->input('codigo')."-".$file->getClientOriginalName();
            $file_name = str_replace(" ","",$file_name);
            \Storage::disk('proyectos')->put($file_name,\File::get($file));

        }

        return  redirect()->route('proyecto.index')->with(array(
            "mensaje"=>"Proyecto registrado con exito"
         ));
    }

    public function validateForm(Request $request){


        $rules = [
            'proyecto_file'=>'mimes:xls,xlsx'
        ];
    
        $customMessages = [
            'mimes' => 'El archivo adjunto debe ser un formato de excel, asegurate de descargar el formato en el paso #1'
        ];
    
        return $this->validate($request, $rules, $customMessages);
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
