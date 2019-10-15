<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Fase;
use App\Models\Grupo;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("app.fase.index");
    }

    public function index_carga()
    {
        $categorias = Categoria::all();
        $fases=Fase::where('estado',0)->get();
        return view("app.fase.carga", compact("categorias",'fases'));
    }

    public function grupos_x_categoria($id_categoria)
    {
        $grupos = Grupo::where("categoria_id", $id_categoria)->get();

        return response()->json($grupos);
    }

    public function index_consulta()
    {
        $categorias = Categoria::all();
        return view("app.fase.consulta", compact("categorias"));
    }

    public function grupos_x_categorias($id_categoria)
    {
        $grupos = Grupo::where("categoria_id", $id_categoria)->get();

        return response()->json($grupos);
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
        //
    }

    public function consultarFase($id)
    {

        $fase = Fase::where("categoria_id", $id)->get();
        return response()->json($fase);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

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
    public function activatePhases(Request $request)
    {
        $input = $request->all();
        if (count(Fase::all())>0) {
            return response()->json([
                'ok'=>false,
                'error'=>'Las fases ya estaban activas'
            ]);
        } else {
            try {
                foreach ($input['data'] as $key => $value) {
                    $dates =  explode(" - ", $value);
                    $phase = Fase::create([
                        'nombre' => 'Fase ' . ($key + 1),
                        'fecha_inicio' => $dates[0].':00',
                        'fecha_fin' => $dates[1].':00'
                    ]);
                }
                return response()->json([
                    'ok'=>true,
                    'message'=>'Fases activadas con éxito'
                ]); 
            } catch (\Throwable $th) {
                return response()->json([
                    'ok'=>false,
                    'error'=>$th->getMessage()
                ]);
            }
        }
    }
}
