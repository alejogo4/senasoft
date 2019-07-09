<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Centro;
use Excel;
use DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //return dd($request);

        $input = $request->all();

        $centro_id = session("id_centro");

        $equipo = Excel::toArray(new ExcelImport, $request->file('equipo_file'));

        $datos_equipos = $this->obtener_equipo_excel($equipo);
         
        if ($datos_equipos != false ){

            DB::beginTransaction();

            try {


                $cont=0;


                foreach( $datos_equipos as $value){

             $categoria_id = Categoria::where("nombre_categoria", $value[0])->first();

         
                    
                if(!empty($categoria_id) && 
                    !empty($value[1]) &&
                    !empty($value[2]) &&
                    !empty($value[4]) &&
                    !empty($value[5]) &&
                    !empty($value[6]) &&
                    !empty($value[7])){

                        
                        Equipo::create([
                            'placa_sena' => $value[1],
                            'serial' => $value[2],
                            'modelo' => $value[3],                            
                            'descripcion' => $value[4],
                            'descripcion_actual' => $value[5],                 
                            'atributos' => $value[6],                            
                            'esp_tecnica' => $value[7],
                            'categoria_id' => $categoria_id->id,
                            'centro_id' => $centro_id,
                            
                            ]);    
                        
                        $cont++;
                    }else{
                        throw new \Exception('Faltan datos por registrar en excel.');
                    }
                }  
                                if ($cont == count($datos_equipos))
                { 

                    $c = Centro::find($centro_id);
                $c->update(["estado_registros"=>1]);
                
                    DB::commit();


                    return response()->json(["ok" => true, "mensaje" => "Se registro correctamente."]);
                }else{
                    throw new \Exception('Faltan datos por registrar en excel.');
                }
            }catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["ok" => false, "mensaje" => $e->getMessage()]);
            }
        }else{
            return response()->json(["ok"=>false, "mensaje"=>"El archivo de excel no cuenta con los datos correctos"]);
        }
    }
   public function obtener_equipo_excel($equipo)
    {
        $equipo_e = [];
        if (count($equipo) > 0) {
            for ($i = 4; $i < count($equipo[0]); $i++) {
                if ($equipo[0][$i][0] != null && $equipo[0][$i][1] != null) {
                    array_push($equipo_e, $equipo[0][$i]);
                }
            }
            return $equipo_e;
        }
        return false;
    }




    public function index()
    {
        return view('web.equipo.index');
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