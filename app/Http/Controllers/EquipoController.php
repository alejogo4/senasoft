<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Equipo;
use App\Models\Cupo;
use DB;
use Excel;
use PDF;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class EquipoController extends Controller
{

    public function index()
    {
        if (session("estado_equipos") == 1) {
            return redirect('/');
        }
        return view("web.equipo.index");
    }
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

        if ($datos_equipos != false) {

            DB::beginTransaction();

            try {

                $cont = 0;
                

                foreach ($datos_equipos as $value) {

                    $categoria_id = Categoria::where("nombre_categoria", $value[0])->first();

                    if (!empty($categoria_id) &&
                        !empty($value[1]) &&
                        !empty($value[2]) &&
                        !empty($value[4]) &&
                        !empty($value[5]) &&
                        !empty($value[6]) &&
                        !empty($value[7])) {
                        
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
                    } else {
                        throw new \Exception('Faltan datos por registrar en excel.');
                    }
                }
                
                if ($cont == count($datos_equipos)) {

                    $c = Centro::find($centro_id);
                    $c->update(["estado_equipos" => 1]);

                    session([
                        "codigo" => null,
                        "estado_equipos" => null
                    ]);

                    DB::commit();

                    return response()->json(["ok" => true, "mensaje" => "Se registro correctamente."]);
                } else {
                    throw new \Exception('Faltan datos por registrar en excel.');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["ok" => false, "mensaje" => $e->getMessage()]);
            }
        } else {
            return response()->json(["ok" => false, "mensaje" => "El archivo de excel no cuenta con los datos correctos"]);
        }
    }
    public function setFile(Request $request, $id)
    {
        $input = $request->all();

        $equipo = Equipo::find($id);
        $validation = Validator::make($input, [
            'adjunto' => 'required|mimes:jpg,png,jpeg,pdf,docx'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validation->messages()
            ]);
        } else {
            $fileName = time() . $input['adjunto']->getClientOriginalName();
            $equipo->update([
                'adjunto' => $fileName
            ]);
            if($equipo->adjunto==null){
                Storage::disk('equipos')->put($fileName, File::get($input['adjunto']));
                return response()->json([
                    'message'=>'Archivo subido con éxito'
                ]);
            }else{
                Storage::delete('/equipos/' .$equipo->adjunto);
                Storage::disk('equipos')->put($fileName, File::get($input['adjunto']));
                return response()->json([
                    'message'=>'Archivo modificado con éxito'
                ]);
            }
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



    /**************************Admin ***************/


    public function index_admin()
    {
        return view("app.equipo.list");
    }

    public function obtener_registros_equipos_centros()
    {
        $equipos = Centro::select("tbl_centro.id", "tbl_centro.nombre_centro", "tbl_regional.nombre_regional", DB::raw("count(tbl_equipo.id) as numero"))
        ->distinct()
        ->join("tbl_equipo", "tbl_equipo.centro_id", "=", "tbl_centro.id")
        ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
        ->groupBy("tbl_centro.id", "tbl_centro.nombre_centro", "tbl_regional.nombre_regional")
        ->get();

        return Datatables::of($equipos)
            ->make(true);
    }

    public function obtener_equipos($id_centro){

        // $categorias = Cupo::with('Categoria')
        // ->where("centro_id", $id_centro)
        // ->get();

        $categorias = Cupo::select('tbl_cupo.*','tbl_categoria.nombre_categoria')
        ->join("tbl_categoria", "tbl_cupo.categoria_id", "=", "tbl_categoria.id")
        ->where("tbl_cupo.centro_id", $id_centro)
        ->get();

        $equipo = Equipo::where("centro_id", $id_centro)
        ->get();

        return response()->json(["ok"=>true, "categorias"=>$categorias, "equipos"=>$equipo]);


    }

    public function generatePDF($id_centro)
    {
        $equipos = Equipo::with("Categoria")
        ->where("centro_id", $id_centro)
        ->orderBy("categoria_id")
        ->get();

        // return view('app.equipo.myPDF', compact('equipos'));

        $pdf = PDF::loadView('app.equipo.myPDF', compact('equipos'));

        $customPaper = array(0,0,500,380);
        $pdf->setPaper($customPaper);
  
        return $pdf->stream('itsolutionstuff.pdf');
    }

}
