<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Yajra\Datatables\Datatables;

class InvitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('app.invitado.index');
    }


    public function listar_registros()
    {
        return view("app.invitado.invitadosyotros");
    }

    
    public function obtener_registros($categoria)
    {
        $personas = Persona::with(["Centro", "Centro.Regional"])
            ->where('tipo_persona', '1')
            ->where('categoria_id', $categoria)
            ->orderBy("id", "DESC")
            ->get();

        return Datatables::of($personas)
            ->editColumn("nombres", function ($persona) {
                return $persona->nombres . " " . $persona->apellidos;
            })
            ->addColumn("qr", function($persona){
                return "data:image/png;base64, ".base64_encode(\QrCode::encoding('UTF-8')->format('png')->size(300)->generate($persona->documento));
            })
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Persona::create([
            'documento' => $input["documento"],
            'tipo_documento' => $input["tipo_documento"],
            'nombres' => $input["nombre"],
            'apellidos' => $input["apellido"],
 
            'correo_principal' => $input["correo"],
           
            'telefono' => $input["telefono"],
            
            'ciudad' => $input["ciudad"],
            
            'tipo_persona' => 1,
            'centro_id' => 4,
            'categoria_id' => 23,
        ]);

        return redirect("/invitados")->with('status', 'Información registrada');
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
