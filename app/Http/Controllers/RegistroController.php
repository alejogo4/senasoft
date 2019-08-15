<?php

namespace App\Http\Controllers;

use App\Exports\PersonasExport;
use App\Imports\ExcelImport;
use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Cupo;
use App\Models\Persona;
use DB;
use Excel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\Datatables\Datatables;
use MPDF;
use PDF;

class RegistroController extends Controller
{
    public function validar_codigo($codigo)
    {
        $url = $_GET['url'];
        $estado = $this->nombre_estado($url);

        if ($codigo != null) {

            $centro = Centro::select("tbl_centro.*", "tbl_regional.nombre_regional")
                ->where("codigo", $codigo)
                ->where($estado, 0)
                ->join("tbl_regional", "tbl_centro.regional_id", "=", "tbl_regional.id")
                ->first();

            if ($centro != null) {

                if ($_GET['url'] == "/proyecto") {
                    $centroPersona = $this->ObtenerDatosCentroPersona($codigo);

                    if ($centroPersona == null) {
                        return response()->json(["ok" => false, "mensaje" => "Para registrar un proyecto de centro, primero debes realizar la inscripción de los aprendices."]);
                    }
                }
                session([
                    "codigo" => $codigo,
                    "id_centro" => $centro->id,
                    "centro" => $centro->nombre_centro,
                    "regional" => $centro->nombre_regional,
                    "ideatic" => $centro->ideatic,
                    $estado => $centro->$estado,
                ]);

                return response()->json(["ok" => true]);
            } else {

                session([
                    "codigo" => null,
                    "id_centro" => null,
                    "centro" => null,
                    "regional" => null,
                    "ideatic" => null,
                    $estado => null,
                ]);

                return response()->json(["ok" => false, "mensaje" => "El código no existe o ya fue utilizado"]);
            }

        } else {
            return response()->json(["ok" => false, "mensaje" => "Debes ingresar un código"]);
        }
    }

    public function nombre_estado($url)
    {

        $estado = "";
        switch ($url) {
            case '/registro':
                $estado = 'estado_registros';
                break;
            case '/proyecto':
                $estado = 'estado_proyectos';
                break;
            case '/equipo':
                $estado = 'estado_equipos';
                break;
        }

        return $estado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado = session("estado_registros");

        if (is_null($estado) || $estado == 1) {
            return redirect("/");
        }
        return view("web.registro.index");
    }

    public function ObtenerDatosCentroPersona($codigo)
    {
        $centro = Centro::where("codigo", $codigo)
            ->join("tbl_persona", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->first();

        return $centro;
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

        $fotos = $request->file('archivo_foto');
        $documentos = $request->file('archivo_documentos');
        $eps = $request->file('archivo_eps');
        $certificados = $request->file('archivo_certificado');

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
                    'centro_id' => $centro_id,
                ]);

                $c_aprendices = 0;

                foreach ($datos_guardar as $value) {

                    if ($this->validar_cupo($value[0])) {

                        if ($this->guardar_aprendiz($value)) {

                            $archivo_doc = array_values(array_filter($documentos, function ($item) use ($value) {
                                return $item->getClientOriginalName() == $value[2] . "_doc.pdf";
                            }));

                            $archivo_eps = array_values(array_filter($eps, function ($item) use ($value) {
                                return $item->getClientOriginalName() == $value[2] . "_eps.pdf";
                            }));

                            $archivo_cert = array_values(array_filter($certificados, function ($item) use ($value) {
                                return $item->getClientOriginalName() == $value[2] . "_cert.pdf";
                            }));

                            $archivo_fotos = array_values(array_filter($fotos, function ($item) use ($value) {
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

                            $cupo->update(["n_cupos_utilizados" => $cupo->n_cupos_utilizados -= 1]);

                            $c_aprendices++;

                        } else {
                            throw new \Exception('Los datos de los aprendices en el excel no se encuentra completos, corrige y vuelve a intentar');
                        }
                    } else {
                        throw new \Exception('Se excedieron los cupos en las categorías, corrige y vuelve a intentar');
                    }
                }

                if ($c_aprendices == 0) {
                    throw new \Exception('No se registraron los aprendices');
                }

                $c = Centro::find($centro_id);
                $c->update(["estado_registros" => 1]);

                session([
                    "codigo" => null,
                    "estado_registros" => null,
                ]);

                DB::commit();

                return response()->json(["ok" => true, "mensaje" => "El registro se realizo de manera correcta"]);

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

        if (!empty($datos[0]) &&
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
            !empty($datos[14])) {

            $fecha = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($datos[5]);

            Persona::create([
                'tipo_documento' => strtoupper($datos[1]),
                'documento' => $datos[2],
                'nombres' => strtoupper($datos[3]),
                'apellidos' => strtoupper($datos[4]),
                'fecha_nacimiento' => $fecha->format("Y-m-d"),
                'foto' => $datos[2] . "_foto.jpg",
                'correo_principal' => strtoupper($datos[6]),
                'correo_alterno' => strtoupper($datos[7]),
                'telefono' => $datos[8],
                'otro_telefono' => $datos[9],
                'ciudad' => $datos[10],
                'ficha' => $datos[11],
                'rh' => $datos[12],
                'eps' => strtoupper($datos[13]),
                'talla_camisa' => $datos[14],
                'tipo_alimentacion' => $datos[15],
                'enfermedades' => strtoupper($datos[16]),
                'alergias' => strtoupper($datos[17]),
                'medicamento_consume' => strtoupper($datos[18]),
                'arhivo_documento' => $datos[2] . "_doc.pdf",
                'arhivo_certificado_eps' => $datos[2] . "_eps.pdf",
                'arhivo_constancia_estudio' => $datos[2] . "_cert.pdf",
                'categoria_id' => $categoria_id->id,
                'centro_id' => $centro_id,
                'tipo_persona' => 2,
            ]);
            return true;
        } else {
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
            if ($cupo->n_cupos_utilizados > 0) {
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

    /************************** Admin ****************************/

    public function listar_registros()
    {
        return view("app.registro.index");
    }

    public function index_admin()
    {
        return view("app.registro.index");
    }

    public function notificaciones()
    {

        $personas = Persona::with(["Centro", "Centro.Regional"])
            ->where("tipo_persona", "1")
            ->where("revision", 0)
            ->orderBy("created_at")
            ->get();

        return response()->json($personas);
    }

    public function obtener_registros()
    {
        $personas = Persona::with(["Centro", "Centro.Regional"])
            ->where('tipo_persona', '1')
            ->get();

        return Datatables::of($personas)
            ->editColumn("nombres", function ($persona) {
                return $persona->nombres . " " . $persona->apellidos;
            })
            ->make(true);
    }

    public function obtener_registros_aprendiz($id)
    {
        $personas = Persona::with(["Categoria"])->where('tipo_persona', '2')
            ->where("centro_id", $id)
            ->orderBy("categoria_id")
            ->get();

        return Datatables::of($personas)
            ->editColumn("nombres", function ($persona) {
                return $persona->nombres . " " . $persona->apellidos;
            })
            ->make(true);
    }

    public function validar_estado_instructor($id_centro)
    {
        $registros = Persona::where("centro_id", $id_centro)
            ->where("tipo_persona", 2)
            ->count();

        $aprobados = Persona::where("centro_id", $id_centro)
            ->where("tipo_persona", 2)
            ->where("revision", 1)
            ->count();

        return $registros == $aprobados ? 1 : 2;
    }

    public function modificar_estado_revision($id, $estado)
    {
        $personas = Persona::find($id);
        if ($personas == null) {
            return response()->json(["ok" => false]);
        }

        $instructor = Persona::where("centro_id", $personas->centro_id)->where("tipo_persona", 1);

        $personas->update(["revision" => $estado]);

        $estado_instructor = $this->validar_estado_instructor($personas->centro_id);

        $instructor->update(["revision" => $estado_instructor]);

        return response()->json(["ok" => true]);
    }

    public function obtener_documento($carpeta, $archivo)
    {

        try {
            $storage = \Storage::disk($carpeta);

            $file = $storage->get($archivo);
            $type = $storage->mimeType($archivo);

            return new Response($file, 200, ["Content-Type" => $type]);
        } catch (\Exception $e) {
            return new Response(null, 404);
        }
    }

    public function exportar_excel()
    {
        return Excel::download(new PersonasExport, 'registros.xlsx');
    }

    public function generarPDF($id_centro)
    {
        $personas = Persona::with("Categoria")
        ->where("centro_id", $id_centro)
        ->orderBy("categoria_id")
        ->get();

        // return view('app.registro.escarapela', compact('personas'));

        $pdf = PDF::loadView('app.registro.escarapela', compact('personas'));

        // $customPaper = array(0,0,500,380);
        $pdf->setPaper("A4", "portrait");
        $pdf->setOptions(["dpi" => "150"]);
  
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
