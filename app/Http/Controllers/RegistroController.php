<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Cupo;
use App\Models\Persona;
use DB;
use Excel;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function validar_codigo($codigo)
    {
        if ($codigo != null) {

            $centro = Centro::select("tbl_centro.*", "tbl_regional.nombre_regional")
                ->where("codigo", $codigo)
                ->where("estado_registros", 0)
                ->join("tbl_regional", "tbl_centro.regional_id", "=", "tbl_regional.id")
                ->first();

            if ($centro != null) {
                session(["codigo" => $codigo, "id_centro" => $centro->id, "centro" => $centro->nombre_centro, "regional" => $centro->nombre_regional]);
                return response()->json(["ok" => true]);
            } else {
                return response()->json(["ok" => false, "mensaje" => "El código no existe o ya fue utilizado"]);
            }

        } else {
            return response()->json(["ok" => false, "mensaje" => "Debes ingresar un código"]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session("codigo") == null) {
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
        $input = $request->all();

        $centro_id = session("id_centro");

        $foto = $request->file('foto');

        $fotos = $request->file('archio_foto');
        $documentos = $request->file('archio_documentos');
        $eps = $request->file('archio_eps');
        $certificados = $request->file('archio_certificado');

        $aprendices = Excel::toArray(new ExcelImport, $request->file('aprendices'));

        $datos_guardar = $this->validar_excel($aprendices, $documentos, $fotos, $eps, $certificados);

        if ($datos_guardar != false) {

            DB::beginTransaction();

            try {
                $fotografia = $this->guardar_archivo($foto, "fotos");

                Persona::create([
                    'documento' => $input["documento"],
                    'tipo_documento' => $input["tipo_documento"],
                    'nombres' => $input["nombre"],
                    'apellidos' => $input["apellido"],
                    'fecha_nacimiento' => $input["fecha_nacimiento"],
                    'foto' => $fotografia,
                    'correo_principal' => $input["correo"],
                    'correo_alterno' => $input["correo_alterno"],
                    'telefono' => $input["telefono"],
                    'otro_telefono' => $input["telefono_alterno"],
                    'rh' => $input["rh"],
                    'talla_camisa' => $input["talla_camisa"],
                    'eps' => $input["eps"],
                    'arl' => $input["arl"],
                    'tipo_contrato' => $input["tipo_contrato"],
                    'programa_formacion' => $input["programa_formacion"],
                    'ciudad' => $input["ciudad"],
                    'ciudad_desplazamiento_aereo' => $input["aeropuerto_desplazamiento"],
                    'tipo_alimentacion' => $input["tipo_alimentacion"],
                    'alergias' => $input["alergias"],
                    'enfermedades' => $input["enfermedades"],
                    'medicamento_consume' => $input["medicamentos"],
                    'tipo_persona' => 1,
                    'centro_id' => $centro_id
                ]);

                $c_aprendices = 0;

                foreach ($datos_guardar as $value) {

                    if ($this->validar_cupo($value[0])) {
                        
                        if ($this->guardar_aprendiz($value)) {

                            $archivo_doc = array_values(array_filter($documentos, function($item) use ($value){
                                return $item->getClientOriginalName() == $value[2] . "_doc.pdf";
                            }));

                            $archivo_eps = array_values(array_filter($eps, function($item) use ($value){
                                return $item->getClientOriginalName() == $value[2] . "_eps.pdf";
                            }));

                            $archivo_cert = array_values(array_filter($certificados, function($item) use ($value){
                                return $item->getClientOriginalName() == $value[2] . "_cert.pdf";
                            }));

                            $archivo_fotos = array_values(array_filter($fotos, function($item) use ($value){
                                return $item->getClientOriginalName() == $value[2] . "_foto.jpg";
                            }));

                            $this->guardar_archivo($archivo_doc[0], "documentos");
                            $this->guardar_archivo($archivo_eps[0], "eps");
                            $this->guardar_archivo($archivo_cert[0], "certificados");
                            $this->guardar_archivo($archivo_fotos[0], "fotos");

                            $centro_id = session("id_centro");
                            $categoria_id = Categoria::where("nombre_categoria", $value[0])->first();
                    
                            $cupo = Cupo::where("centro_id", $centro_id)
                                ->where("categoria_id", $categoria_id->id)
                                ->first();
                            
                            $cupo->update(["n_cupos_utilizados" => $cupo->n_cupos_utilizados-=1]);

                            $c_aprendices++;

                        }else{
                            throw new \Exception('Los datos de los aprendices en el excel no se encuentra completos.');
                        }
                    }
                }

                if ($c_aprendices == 0) {
                    throw new \Exception('No se registraron los aprendices');
                }

                $c = Centro::find($centro_id);
                $c->update(["estado_registros"=>1]);

                DB::commit();

                return response()->json(["ok"=>true, "mensaje"=>"El registro se realizo de manera correcta"]);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["ok" => false, "mensaje" => $e->getMessage()]);
            }
        }

        return response()->json(["ok" => false, "mensaje" => "Los documento adjuntos no cumplen con lo solicitado."]);
    }

    #region metodos validadores registros

    public function guardar_archivo($archivo, $carpeta)
    {
        $nombre_archivo = $archivo->getClientOriginalName();
        \Storage::disk($carpeta)->put($nombre_archivo, \File::get($archivo));
        return $nombre_archivo;
    }

    public function guardar_aprendiz($datos)
    {
        $centro_id = session("id_centro");
        $categoria_id = Categoria::where("nombre_categoria", $datos[0])->first();

        if(!empty($datos[0]) && 
        !empty($datos[1]) &&
        !empty($datos[2]) &&
        !empty($datos[3]) &&
        !empty($datos[4]) &&
        !empty($datos[5]) &&
        !empty($datos[6]) &&
        !empty($datos[8]) &&
        !empty($datos[10]) &&
        !empty($datos[11]) &&
        !empty($datos[12]) &&
        !empty($datos[13]) &&
        !empty($datos[14])){

            Persona::create([
                'tipo_documento' => $datos[1],
                'documento' => $datos[2],
                'nombres' => $datos[3],
                'apellidos' => $datos[4],
                'fecha_nacimiento' => $datos[5],
                'foto' => $datos[2]."_foto.png",
                'correo_principal' => $datos[6],
                'correo_alterno' => $datos[7],
                'telefono' => $datos[8],
                'otro_telefono' => $datos[9],
                'ciudad' => $datos[10],
                'ficha' => $datos[11],
                'rh' => $datos[12],
                'eps' => $datos[13],
                'talla_camisa' => $datos[14],
                'tipo_alimentacion' => $datos[15],
                'enfermedades' => $datos[16],
                'alergias' => $datos[17],
                'medicamento_consume' => $datos[18],
                'arhivo_documento' => $datos[2]."_doc.pdf",
                'arhivo_certificado_eps' => $datos[2]."_eps.pdf",
                'arhivo_constancia_estudio' => $datos[2]."_cert.pdf",
                'categoria_id' => $categoria_id->id,
                'centro_id' => $centro_id,
                'tipo_persona' => 2
            ]);
            return true;
        }else{
            return false;
        }
    }

    public function validar_cupo($categoria)
    {

        $centro_id = session("id_centro");
        $categoria_id = Categoria::where("nombre_categoria", $categoria)->first();

        $cupo = Cupo::where("centro_id", $centro_id)
            ->where("categoria_id", $categoria_id->id)
            ->first();

        if ($cupo != null) {
            if ($cupo->n_cupos_disponibles > 0) {
                return true;
            }
        }

        return false;
    }

    public function validar_excel($aprendices, $documentos, $fotos, $eps, $estudio)
    {
        $datos_aprendices = $this->obtener_aprendices_excel($aprendices);
        if ($datos_aprendices != false) {

            if (count($datos_aprendices) == count($documentos) && count($datos_aprendices) == count($fotos) && count($datos_aprendices) == count($eps) && count($datos_aprendices) == count($estudio)) {

                if ($this->valirdar_documento("_doc", ".pdf", $datos_aprendices, $documentos) &&
                    $this->valirdar_documento("_eps", ".pdf", $datos_aprendices, $eps) &&
                    $this->valirdar_documento("_cert", ".pdf", $datos_aprendices, $estudio) &&
                    $this->valirdar_documento("_foto", ".jpg", $datos_aprendices, $fotos)) {

                    return $datos_aprendices;
                }
            }
        }
        return false;
    }

    public function valirdar_documento($prefijo, $extension, $aprendices, $comparar)
    {
        $cont = 0;
        foreach ($aprendices as $value) {
            $filtro = array_filter($comparar, function ($item) use ($prefijo, $extension, $value) {
                return $item->getClientOriginalName() == $value[2] . $prefijo . $extension;
            });

            if (count($filtro) > 0) {
                $cont++;
            }
        }

        return $cont == count($aprendices) ? true : false;
    }

    public function obtener_aprendices_excel($aprendices)
    {
        $aprendices_a = [];
        if (count($aprendices) > 0) {
            for ($i = 4; $i < count($aprendices[0]); $i++) {
                if ($aprendices[0][$i][0] != null && $aprendices[0][$i][2] != null && $aprendices[0][$i][3] != null) {
                    array_push($aprendices_a, $aprendices[0][$i]);
                }
            }
            return $aprendices_a;
        }
        return false;
    }

    public function listar_registros(){
        return view("app.registro.index");
    }

}
