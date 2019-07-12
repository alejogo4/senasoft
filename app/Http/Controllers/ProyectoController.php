<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

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

    public function index_admin()
    {

        $proyectos = Proyecto::with(['Centro'])->get();
        return view("web.proyecto.list", array(
            "proyectos" => $proyectos,
        ));
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
    public function update(Request $request)
    {
        //

        $proyecto = Proyecto::find($request->id);
        $proyecto->puntaje = $request->puntaje;
        $proyecto->estado = $request->estado;
        $proyecto->update();

        return response()->json(["ok" => true]);
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

    public function getProjectFile($file)
    {

        $file = \Storage::disk('proyectos')->get($file);
        return new Response($file, 200);

    }
}
