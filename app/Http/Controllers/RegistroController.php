<?php

namespace App\Http\Controllers;

use App\Imports\AprendicesImport;
use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Cupo;
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

        $foto = $request->file('fotografia');

        $fotos = $request->file('archio_foto');
        $documentos = $request->file('archio_documentos');
        $eps = $request->file('archio_eps');
        $certificados = $request->file('archio_certificado');

        $aprendices = Excel::toArray(new AprendicesImport, $request->file('aprendices'));

        $datos_guardar = $this->validar_excel($aprendices, $documentos, $fotos, $eps, $certificados);

        if ($datos_guardar != false) {

            DB::beginTransaction();

            try {
                $fotografia = $this->guardar_archivo($foto, "fotos");
                Personal::create([
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
                    'ciudad' => $input["ciudad"],
                    'ciudad_desplazamiento_aereo' => $input["ciudad_desplazamiento"],
                    'tipo_alimentacion' => $input["tipo_alimentacion"],
                    'alergias' => $input["alergias"],
                    'enfermedades' => $input["enfermedades"],
                    'medicamento_consume' => $input["medicamentos"],
                    'tipo_persona' => 1,
                    'tour' => isset($input["tour"]) ? true : false,
                ]);
                $c_aprendices = 0;
                foreach ($datos_guardar as $value) {
                    if ($this->validar_cupo($value[0])) {

                        if ($this->guardar_aprendiz($value)) {

                            $archivo_doc = array_value(array_filter($documentos, function(){
                                return $item->getClientOriginalName() == $value[2] . "_doc.pdf";
                            }));

                            $archivo_eps = array_value(array_filter($eps, function(){
                                return $item->getClientOriginalName() == $value[2] . "_eps.pdf";
                            }));

                            $archivo_cert = array_value(array_filter($certificados, function(){
                                return $item->getClientOriginalName() == $value[2] . "_cert.pdf";
                            }));

                            $archivo_fotos = array_value(array_filter($fotos, function(){
                                return $item->getClientOriginalName() == $value[2] . "_foto.jpg";
                            }));

                            $this->guardar_archivo($archivo_doc[0], "documentos");
                            $this->guardar_archivo($archivo_eps[0], "eps");
                            $this->guardar_archivo($archivo_cert[0], "certificados");
                            $this->guardar_archivo($archivo_fotos[0], "fotos");

                            $centro_id = session("id_centro");
                            $categoria_id = Categoria::where("nombre_categoria", $categoria)->first();
                    
                            $cupo = Cupo::where("centro_id", $centro_id)
                                ->where("categoria_id", $categoria_id->id)
                                ->first();
                            
                            $cupo->update("n_cupos_disponibles", $cupo->n_Cupos_disponibles-=1);

                            $c_aprendices++;
                        }
                    }
                }

                if ($c_aprendices == 0) {
                    throw new Exception('No se registraron los aprendices');
                }

                return response()->json(["ok"=>true, "mensaje"=>"El registro se realizo de manera correcta"]);

                DB::commit();
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
        Personal::create([
            'documento' => $input["documento"],
            'tipo_documento' => $input["tipo_documento"],
            'nombres' => $input["nombre"],
            'apellidos' => $input["apellido"],
            'fecha_nacimiento' => $input["fecha_nacimiento"],
            'foto' => $input[""],
            'correo_principal' => $input["correo"],
            'correo_alterno' => $input["correo_alterno"],
            'telefono' => $input["telefono"],
            'otro_telefono' => $input["telefono_alterno"],
            'rh' => $input["rh"],
            'talla_camisa' => $input["talla_camisa"],
            'eps' => $input["eps"],
            'arl' => $input["arl"],
            'tipo_contrato' => $input["tipo_contrato"],
            'ciudad' => $input["ciudad"],
            'ciudad_desplazamiento_aereo' => $input["ciudad_desplazamiento"],
            'tipo_alimentacion' => $input["tipo_alimentacion"],
            'alergias' => $input["alergias"],
            'enfermedades' => $input["enfermedades"],
            'medicamento_consume' => $input["medicamentos"],
            'arhivo_documento' => $input[""],
            'arhivo_certificado_eps' => $input[""],
            'arhivo_constancia_estudio' => $input[""],
            'asignacion_cupos_id' => $input[""],
            'tipo_persona' => 1,
            'tour' => isset($input["tour"]) ? true : false,
        ]);
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
                    $this->valirdar_documento("_cert", ".pdf", $datos_aprendices, $eps) &&
                    $this->valirdar_documento("_foto", ".jpg", $datos_aprendices, $eps)) {

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

    #endregion

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
