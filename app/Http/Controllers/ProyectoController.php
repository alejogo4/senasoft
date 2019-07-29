<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Yajra\Datatables\Datatables;
use DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store', 'validar', 'index']);
    }

    public function index()
    {
        //
        $centro = $this->ObtenerDatosCentroPersona();

        if (session("estado_proyectos") == 1 || $centro == null) {
            return redirect("/");
        }

        return view("web.proyecto.index", array(
            "persona_centro" => $centro,
        ));

    }

    public function ObtenerDatosCentroPersona()
    {
        $centro = Centro::where("codigo", session('codigo'))
            ->join("tbl_persona", "tbl_centro.id", "=", "tbl_persona.centro_id")
            ->first();

        return $centro;
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

        $centro_id = session("id_centro");

        $Proyecto = new Proyecto();
        $Proyecto->centro_id = $centro_id;
        $file = $request->file('proyecto_file');
        if ($file) {
            $file_name = session('codigo') . "-" . $file->getClientOriginalName();
            $file_name = str_replace(" ", "", $file_name);
            $Proyecto->arhivo_proyecto_centro = $file_name;
            \Storage::disk('proyectos')->put($file_name, \File::get($file));
        } else {
            $Proyecto->arhivo_proyecto_centro = "null";
        }
        $Proyecto->save();

        $c = Centro::find($centro_id);
        $c->update(["estado_proyectos" => 1]);

        session([
            "codigo" => null,
            "estado_registros" => null
        ]);

        return response()->json(["mensaje" => "El proyecto se ha cargado con éxito.", 'ok' => true]);
    }

    public function validateForm(Request $request)
    {
        $rules = [
            'proyecto_file' => 'mimes:xls,xlsx',
        ];

        $customMessages = [
            'mimes' => 'El archivo adjunto debe ser un formato de excel, asegurate de descargar el formato en el paso #1',
        ];

        return $this->validate($request, $rules, $customMessages);
    }

    
    public function index_admin()
    {
        return view("app.proyecto.list");
    }

    public function obtener_registros()
    {
        $proyectos = Proyecto::with(["Centro", "Centro.Regional"])
        ->select("tbl_proyecto.*", "tbl_centro.*", DB::raw("tbl_proyecto.id as id_proyecto"))
        ->join("tbl_centro", "tbl_proyecto.centro_id", "=", "tbl_centro.id")
        ->get();

        return Datatables::of($proyectos)
            ->make(true);
    }

    public function update(Request $request)
    {
        //
        $proyecto = Proyecto::find($request->id);
        $proyecto->puntaje = $request->puntaje;
        $proyecto->estado = $request->estado;
        $proyecto->update();
        return response()->json(["ok" => true]);
    }

    public function getProjectFile($file)
    {
        $file = \Storage::disk('proyectos')->get($file);
        return new Response($file, 200);
    }
    
}
