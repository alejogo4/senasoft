<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\Centro;
use App\Models\Categoria;
use App\Models\Fase;
use Illuminate\Support\Carbon;

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
        $this->validateFase();
        $fases = Fase::all();
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
            "fases"=>$fases
            ]);
    }
    private function validateFase()
    {
        $fases = Fase::all();

        foreach ($fases as $key => $value) {
            $date = Carbon::now()->isoFormat('YYYY-MM-DD HH:mm').':00';
            if ($date>$value->fecha_inicio&&$date<$value->fecha_fin) {
                $value->update(['estado'=>1]);
            } else {
                $value->update(['estado'=>0]);
            }
            
        }
    }
}
