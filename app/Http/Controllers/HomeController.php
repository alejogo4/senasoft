<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\Centro;
use App\Models\Categoria;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $centros = Centro::select("tbl_regional.nombre_regional", "tbl_centro.nombre_centro", "tbl_persona.nombres", "tbl_persona.revision")
        ->join("tbl_regional", "tbl_centro.regional_id", "=", "tbl_regional.id")
        ->leftJoin('tbl_persona', function ($join) {
            $join->on("tbl_persona.centro_id", "=", "tbl_centro.id")
                 ->where("tbl_persona.tipo_persona", 1);
        })
        ->orderBy("tbl_regional.id")
        ->get();

        $categorias = Categoria::select(
            "tbl_categoria.nombre_categoria", 
            DB::raw("sum(tbl_cupo.n_cupos_disponibles) as cupos"), 
            DB::raw("(select count(*) from tbl_persona where tbl_persona.categoria_id = tbl_categoria.id) as utilizados")
        )
        ->join("tbl_cupo", "tbl_categoria.id", "=", "tbl_cupo.categoria_id")
        ->groupBy("tbl_categoria.id", "tbl_categoria.nombre_categoria")
        ->get();

        $total = Persona::count();

        $total_i = Persona::where("tipo_persona", 1)->count();
        $total_a = Persona::where("tipo_persona", 2)->count();

        $total_planta = Persona::where("tipo_contrato", "PLANTA")->count();
        $contratistas = Persona::where("tipo_contrato", "CONTRATISTA")->count();

        $user = Auth::user();
        $rol = $user->roles->implode('name',',');
        //dd($user->roles);
        return view('home', [
            "rol"=>$rol,
            "mensaje"=>"Bienvenido ".$rol,
            "centros"=>$centros,
            "categorias"=>$categorias,
            "total"=>$total,
            "total_i"=>$total_i,
            "total_a"=>$total_a,
            "total_planta"=>$total_planta,
            "contratistas"=>$contratistas,
            ]);
    }
}
