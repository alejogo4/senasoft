<?php

namespace App\Http\Controllers;

use App\Exports\PersonasExport;
use App\Imports\ExcelImport;
use App\Models\Categoria;
use App\Models\Centro;
use App\Models\Cupo;
use App\Models\Grupo;
use App\Models\GrupoPersonas;
use App\Models\Persona;
use DB;
use Excel;
use Illuminate\Http\Request;
use PDF;
use Symfony\Component\HttpFoundation\Response;
// use MPDF;
use Yajra\Datatables\Datatables;

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
        $personas = Persona::select(
            "categoria_id",
            "tipo_persona",
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombres), 1)), SUBSTRING(LCASE(nombres), 2)) as nombres"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(apellidos), 1)), SUBSTRING(LCASE(apellidos), 2)) as apellidos"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombre_centro), 1)), SUBSTRING(LCASE(nombre_centro), 2)) as nombre_centro"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombre_regional), 1)), SUBSTRING(LCASE(nombre_regional), 2)) as nombre_regional"),
            "documento",
            "foto"
        )
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
            ->where("centro_id", $id_centro)
            ->orderBy("categoria_id")
            ->get();


        // return view('app.registro.escarapela', compact('personas'));

        $pdf = PDF::loadView('app.registro.escarapela', compact('personas'));

        // $customPaper = array(0,0,500,380);
        $pdf->setPaper("A4", "portrait");
        $pdf->setOptions(["dpi" => "150"]);

        return $pdf->stream('escarapela.pdf');
    }


    public function generarPDFCategoria($categoria_id)
    {
        $personas = Persona::select(
            "categoria_id",
            "tipo_persona",
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombres), 1)), SUBSTRING(LCASE(nombres), 2)) as nombres"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(apellidos), 1)), SUBSTRING(LCASE(apellidos), 2)) as apellidos"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombre_centro), 1)), SUBSTRING(LCASE(nombre_centro), 2)) as nombre_centro"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombre_regional), 1)), SUBSTRING(LCASE(nombre_regional), 2)) as nombre_regional"),
            "documento",
            "foto"
        )
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
            ->where("categoria_id", $categoria_id)
            ->orderBy("categoria_id")
            ->get();

        // return view('app.registro.escarapela', compact('personas'));

        $pdf = PDF::loadView('app.registro.escarapela', compact('personas'));

        // $customPaper = array(0,0,500,380);
        $pdf->setPaper("A4", "portrait");
        $pdf->setOptions(["dpi" => "150"]);

        return $pdf->stream('escarapela.pdf');
    }



    public function generarPDFEqupos($id_centro)
    {
        $p = Persona::select(
            "nombre_categoria",
            "categoria_id",
            "tipo_persona",
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombres), 1)), SUBSTRING(LCASE(nombres), 2)) as nombres"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(apellidos), 1)), SUBSTRING(LCASE(apellidos), 2)) as apellidos"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombre_centro), 1)), SUBSTRING(LCASE(nombre_centro), 2)) as nombre_centro"),
            DB::raw("CONCAT(UCASE(LEFT(LCASE(nombre_regional), 1)), SUBSTRING(LCASE(nombre_regional), 2)) as nombre_regional"),
            "documento", 
            "tipo_documento"
        )
            ->join("tbl_categoria", "tbl_categoria.id", "=", "tbl_persona.categoria_id")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
            ->where("centro_id", $id_centro)
            ->where("tipo_persona", 2)
            ->where("categoria_id", "<", 11)
            ->orderBy("categoria_id")
            ->get();
        
        $personas = $this->duplicar_registros_equipos($p);

        // return view('app.registro.equipos', compact('personas'));

        $pdf = PDF::loadView('app.registro.equipos', compact('personas'));

        // $customPaper = array(0,0,500,380);
        $pdf->setPaper("A4", "portrait");
        $pdf->setOptions(["dpi" => "150"]);

        return $pdf->stream('equipos.pdf');
    }

    public function duplicar_registros_equipos($personas){
        $duplicar = [2,2,2,4,10,2,2,3,3,2];
        $resultado = [];

        foreach($personas as $value){
            for($i = 0; $i < $duplicar[$value->categoria_id-1]; $i++){
                $resultado[] = $value;
            }
        }

        return $resultado;
    }


    public function ggrupos()
    {

        return view("app.registro.grupos");
    }

    public function listarGrupos()
    {

        $categorias = Categoria::all();
        $resultados = [];

        foreach ($categorias as $key => $value) {
            $datos = Grupo::select("tbl_grupo.nombre", "tbl_persona.programa_formacion", "tbl_persona.nombres", "tbl_persona.apellidos", "tbl_persona.correo_principal", "tbl_centro.*", "tbl_regional.*")
                ->join("tbl_grupo_persona", "tbl_grupo_persona.grupo_id", "=", "tbl_grupo.id")
                ->join("tbl_persona", "tbl_grupo_persona.persona_id", "=", "tbl_persona.id")
                ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
                ->join("tbl_regional", "tbl_regional.id", "=", "tbl_centro.regional_id")
                ->where("tbl_grupo.categoria_id", $value->id)
                ->get();

            $resultado[$value->nombre_categoria] = [$datos, $value->tipo_agrupacion];
        }

        return response()->json($resultado);
    }

    public function generarGrupos()
    {
        $categorias = Categoria::all();

        foreach ($categorias as $key => $value) {
            if ($value->id == 1) {
                $this->generarGrupoAlgoritmia($value->nombre_categoria, $value->id);
            } else if ($value->id == 5) {
                $this->generarGrupoRedesMantenimiento($value->nombre_categoria, $value->id);
            } else if ($value->id == 10) {
                $this->generarGrupoIDEATIC($value->nombre_categoria, $value->id);
            } else if($value->id != 11) {
                $this->generarGrupoCategoria($value->nombre_categoria, $value->id);
            }
        }

        return response()->json(["ok" => true]);
    }

    public function generarGrupoCategoria($nombre, $id)
    {

        $personasCt = Persona::select("tbl_persona.id", "tbl_centro.regional_id", "tbl_persona.centro_id")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->where("categoria_id", $id)
            ->where("tipo_persona", 2)
            ->orderBy("tbl_centro.regional_id")
            ->orderBy("tbl_centro.id")
            ->get()
            ->toArray();

        $personasCategoria = $personasCt;

        $i = 0;
        $grupos = 1;

        $paraeliminar = [];

        while (count($personasCategoria) > 0) {

            if (isset($personasCategoria[$i])) {

                $indexpareja = 0;
                $per1 = $personasCategoria[$i];

                $controlaciclo = 0;
                $fallos = 0;
                while (true) {
                    $pareja = rand(1, count($personasCategoria) - 1);
                    $per2 = $personasCategoria[$pareja];

                    if ($per1["regional_id"] != $per2["regional_id"]) {
                        $indexpareja = $pareja;
                        break;
                    }

                    if ($controlaciclo > count($personasCategoria)) {
                        $pareja = rand(1, count($personasCategoria) - 1);
                        $per2 = $personasCategoria[$pareja];

                        if ($per1["centro_id"] != $per2["centro_id"]) {
                            $indexpareja = $pareja;
                            break;
                        } else {
                            $fallos++;
                        }
                    }
                    if ($fallos == 3) {
                        break;
                    }
                    $controlaciclo++;
                }

                if ($fallos < 3) {
                    $grupo = Grupo::create(["nombre" => $nombre . " " . $grupos, "categoria_id" => $id]);
                    $grupo_detalle1 = GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $per1["id"]]);
                    $grupo_detalle2 = GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $personasCategoria[$indexpareja]["id"]]);

                    $paraeliminar[] = $grupo_detalle1->id;
                    $paraeliminar[] = $grupo_detalle2->id;

                    unset($personasCategoria[$indexpareja]);
                    unset($personasCategoria[$i]);

                    $personasCategoria = array_values($personasCategoria);
                    $grupos++;

                } else {

                    Grupo::where("categoria_id", $id)->delete();
                    GrupoPersonas::whereIn("id", $paraeliminar)->delete();
                    $grupos = 1;
                    $personasCategoria = $personasCt;
                    $paraeliminar = [];
                }
            }
        }
    }

    public function generarGrupoAlgoritmia($nombre, $id)
    {
        $personasCategoria = Persona::select("tbl_persona.id", "tbl_centro.regional_id", "tbl_persona.centro_id")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->where("categoria_id", $id)
            ->where("tipo_persona", 2)
            ->orderBy("tbl_centro.regional_id")
            ->orderBy("tbl_centro.id")
            ->get()
            ->toArray();

        foreach ($personasCategoria as $key => $value) {
            $grupo = Grupo::create(["nombre" => $nombre . " " . ($key + 1), "categoria_id" => $id]);
            GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $value["id"]]);
        }
    }

    public function generarGrupoRedesMantenimiento($nombre, $id)
    {
        $programa1 = "MANTENIMIENTO DE EQUIPOS DE CÓMPUTO, DISEÑO E INSTALACIÓN DE CABLEADO ESTRUCTURADO";
        $programa2 = "GESTIÓN DE REDES DE DATOS";

        $personasCt = Persona::select("tbl_persona.id", "tbl_centro.regional_id", "tbl_persona.centro_id", "tbl_persona.programa_formacion")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->where("categoria_id", $id)
            ->where("tipo_persona", 2)
            ->orderBy("tbl_centro.regional_id")
            ->orderBy("tbl_centro.id")
            ->get()
            ->toArray();

        $personasCategoria = $personasCt;

        $i = 0;
        $grupos = 1;
        $paraeliminar = [];

        while (count($personasCategoria) > 0) {

            if (isset($personasCategoria[$i])) {

                $indexpareja = 0;
                $per1 = $personasCategoria[$i];
                $programaPareja = "";
                if ($per1["programa_formacion"] == $programa1) {
                    $programaPareja = $programa2;
                } else {
                    $programaPareja = $programa1;
                }

                $controlaciclo = 0;
                $fallos = 0;
                while (true) {
                    $pareja = rand(1, count($personasCategoria) - 1);
                    $per2 = $personasCategoria[$pareja];

                    if ($per1["regional_id"] != $per2["regional_id"] && $programaPareja == $per2["programa_formacion"]) {
                        $indexpareja = $pareja;
                        break;
                    }

                    if ($controlaciclo > count($personasCategoria)) {

                        $pareja = rand(1, count($personasCategoria) - 1);
                        $per2 = $personasCategoria[$pareja];

                        if ($per1["centro_id"] != $per2["centro_id"] && $programaPareja == $per2["programa_formacion"]) {
                            $indexpareja = $pareja;
                            break;
                        } else {
                            $fallos++;
                        }
                    }

                    if ($fallos == 3) {
                        break;
                    }
                    $controlaciclo++;
                }

                if ($fallos < 3) {
                    $grupo = Grupo::create(["nombre" => $nombre . " " . $grupos, "categoria_id" => $id]);
                    $grupo_detalle1 = GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $per1["id"]]);
                    $grupo_detalle2 = GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $personasCategoria[$indexpareja]["id"]]);

                    $paraeliminar[] = $grupo_detalle1->id;
                    $paraeliminar[] = $grupo_detalle2->id;

                    unset($personasCategoria[$indexpareja]);
                    unset($personasCategoria[$i]);

                    $personasCategoria = array_values($personasCategoria);
                    $grupos++;

                } else {

                    Grupo::where("categoria_id", $id)->delete();
                    GrupoPersonas::whereIn("id", $paraeliminar)->delete();
                    $grupos = 1;
                    $personasCategoria = $personasCt;
                    $paraeliminar = [];
                }
            }
        }
    }

    public function generarGrupoIDEATIC($nombre, $id)
    {

        $programa1 = "ANÁLISIS Y DESARROLLO DE SISTEMAS DE INFORMACIÓN";
        $programa2 = "PRODUCCIÓN DE MEDIOS AUDIOVISUALES DIGITALES";
        $programa3 = "PRODUCCIÓN DE MULTIMEDIA";

        $personasCategoria1 = Persona::select("tbl_persona.id", "tbl_centro.regional_id", "tbl_persona.centro_id", "tbl_persona.programa_formacion")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->where("categoria_id", $id)
            ->where("tipo_persona", 2)
            ->where("programa_formacion", $programa1)
            ->get()
            ->toArray();

        $personasCategoria2 = Persona::select("tbl_persona.id", "tbl_centro.regional_id", "tbl_persona.centro_id", "tbl_persona.programa_formacion")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->where("categoria_id", $id)
            ->where("tipo_persona", 2)
            ->where("programa_formacion", $programa2)
            ->get()
            ->toArray();

        $personasCategoria3 = Persona::select("tbl_persona.id", "tbl_centro.regional_id", "tbl_persona.centro_id", "tbl_persona.programa_formacion")
            ->join("tbl_centro", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->where("categoria_id", $id)
            ->where("tipo_persona", 2)
            ->where("programa_formacion", $programa3)
            ->get()
            ->toArray();

        $grupos = 1;
        $i = 0;
        while (count($personasCategoria1) > 0 && count($personasCategoria2) > 0 && count($personasCategoria3) > 0) {

            $pareja1 = $this->aleatorioIdeatic($personasCategoria1, 0);
            $pareja2 = $this->aleatorioIdeatic($personasCategoria2, $personasCategoria1[$pareja1]["regional_id"]);
            $pareja3 = $this->aleatorioIdeatic($personasCategoria2, $personasCategoria2[$pareja2]["regional_id"]);

            $grupo = Grupo::create(["nombre" => $nombre . " " . $grupos, "categoria_id" => $id]);
            GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $personasCategoria1[$pareja1]["id"]]);
            GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $personasCategoria2[$pareja2]["id"]]);
            GrupoPersonas::create(["grupo_id" => $grupo->id, "persona_id" => $personasCategoria3[$pareja3]["id"]]);

            unset($personasCategoria1[$pareja1]);
            unset($personasCategoria2[$pareja2]);
            unset($personasCategoria3[$pareja3]);

            $personasCategoria1 = array_values($personasCategoria1);
            $personasCategoria2 = array_values($personasCategoria2);
            $personasCategoria3 = array_values($personasCategoria3);

            $grupos++;
        }
    }

    public function aleatorioIdeatic($personas, $regional_id)
    {
        $controlaciclo = 0;
        $indexpareja = 0;
        while (true) {
            $pareja = rand(0, count($personas) - 1);
            $per2 = $personas[$pareja];

            if ($regional_id != $per2["regional_id"]) {
                $indexpareja = $pareja;
                break;
            }

            if ($controlaciclo > count($personas)) {

                $pareja = rand(0, count($personas) - 1);
                $per2 = $personas[$pareja];

                $indexpareja = $pareja;
                break;
            }

            $controlaciclo++;
        }
        return $indexpareja;
    }
}
