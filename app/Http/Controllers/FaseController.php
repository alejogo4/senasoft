<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Fase;
use App\Models\Grupo;
use App\Models\GrupoEvaluacion;
use App\Models\GrupoPersonas;
use App\Models\Porcentaje;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("app.fase.index");
    }
    public function finalistas()
    {
        $button = false;
        $this->validateFase();
        if (Fase::find(4)->estado == 1) {
            $button = true;
        }
        return view("app.fase.finalistas", compact('button'));
    }
    public function getFinalistas()
    {
        $categorias = Categoria::all();

        $groups = [];

        foreach ($categorias as $e) {
            $data = Grupo::where('categoria_id', $e->id)
                ->with('fases')
                ->get();
            foreach ($data as $g) {
                $total = 0;
                foreach ($g->fases as $i => $el) {

                    $porcentaje = Porcentaje::where('categoria_id', $g->categoria_id)->where('fase_id', $el->fase_id)->first();
                    // $cal = ($el->puntaje / 100) * $porcentaje->porcentaje;

                    $total = $total + $el->puntaje;
                }
                $g->total_puntos = $total;
            }
            // dd($data);
            $new = $data->sortByDesc('total_puntos');
            $new->splice(15, (count($data) - 15));
            foreach ($new as $i => $n) {
                $n->pos = $i + 1;
                array_push($groups, $n);
            }
        }

        return response()->json([
            'categorias' => $categorias,
            'grupos' => $groups
        ]);
    }
    public function index_carga()
    {
        $this->validateFase();
        $grupos = Grupo::where("categoria_id", Auth::user()->categoria_id)->get();
        $fases = Fase::where('estado', 2)->get();
        return view("app.fase.carga", compact("grupos", 'fases'));
    }
    public function totalPoints()
    {
        $categorias = Categoria::all();
        return view('app.fase.totalpuntos', compact('categorias'));
    }
    public function getPoints($id)
    {
        $groups = [];
        $data = Grupo::where('categoria_id', $id)
            ->with('fases')
            ->get();
        foreach ($data as $g) {
            $total = 0;
            foreach ($g->fases as $i => $el) {

                $porcentaje = Porcentaje::where('categoria_id', $g->categoria_id)->where('fase_id', $el->fase_id)->first();
                // $cal = ($el->puntaje / 100) * $porcentaje->porcentaje;
                $total = $total + $el->puntaje;
            }
            $g->total_puntos = $total;
        }
        // dd($data);
        $new = $data->sortByDesc('total_puntos');
        foreach ($new as $i => $n) {
            $n->pos = $i + 1;
            array_push($groups, $n);
        }
        return response()->json([
            'data' => $groups
        ]);
    }
    public function setFile(Request $request, $id)
    {
        $input = $request->all();
        $evaluacion = GrupoEvaluacion::find($id);
        $validation = Validator::make($input, [
            'adjunto' => 'required|mimes:jpg,png,jpeg,pdf,docx'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validation->messages()
            ]);
        } else {
            Storage::delete('/fases/' .$evaluacion->adjunto);

            $fileName = time() . $input['adjunto']->getClientOriginalName();
            Storage::disk('fases')->put($fileName, File::get($input['adjunto']));

            $evaluacion->update([
                'adjunto' => $fileName
            ]);

            return response()->json([
                'ok' => true,
                'message' => 'Calificación actualizada con éxito'
            ]);
        }
    }
    public function downloadFile($name)
    {
        try {
            return response()->download(storage_path('app\\fases\\'.$name));
        } catch (\Throwable $th) {
           return response()->json($th->getMessage());
        }

    }

    private function validateFase()
    {
        $fases = Fase::all();

        foreach ($fases as $key => $value) {
            $date = Carbon::now()->isoFormat('YYYY-MM-DD HH:mm') . ':00';
            if ($date > $value->fecha_inicio && $date < $value->fecha_fin) {
                $value->update(['estado' => 1]);
            } else if ($date < $value->fecha_inicio) {
                $value->update(['estado' => 0]);
            } else if ($date > $value->fecha_fin) {
                $value->update(['estado' => 2]);
            }
        }
    }
    public function grupos_x_categoria($id_categoria)
    {
        $grupos = Grupo::where("categoria_id", $id_categoria)->get();

        return response()->json($grupos);
    }

    public function index_consulta()
    {
        $categorias = Categoria::all();
        $evaluacion = GrupoEvaluacion::all();
        return view("app.fase.consulta", compact("categorias", "evaluacion"));
    }

    public function grupos_x_categorias($id_categoria)
    {
        $grupos = Grupo::where("categoria_id", $id_categoria)->get();

        return response()->json($grupos);
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
        $input = $request->all();
        $validation = Validator::make($input, [
            'nombre_jurado' => 'required|string|max:45',
            'grupo_id' => 'required',
            'puntaje' => 'required|integer|gt:-1',
            'adjunto' => 'mimes:jpg,png,jpeg,pdf,docx'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'ok' => false,
                'messages' => $validation->messages()
            ]);
        }
        $categoria_id = Auth::user()->categoria_id;
        $valorMax = Porcentaje::where('categoria_id',$categoria_id)->where('fase_id',$input['fase_id'])->first();
        if ($input['puntaje']>$valorMax->porcentaje) {
            return response()->json([
                'ok'=>false,
                'mensaje'=>"El valor máximo permitido para esta fase es $valorMax->porcentaje"
            ]);
        } else {
            $val = GrupoEvaluacion::where('grupo_id', $input['grupo_id'])->where('fase_id', $input['fase_id'])->first();
            if ($val != null) {
                return response()->json([
                    'ok' => false,
                    'mensaje' => 'Este grupo ya ha sido evaluado en esta fase'
                ]);
            } else {
                try {
                    $fileName = time() . $input['adjunto']->getClientOriginalName();
                    Storage::disk('fases')->put($fileName, File::get($input['adjunto']));
                    $input['adjunto'] = $fileName;
                    $input['categoria_id'] = Auth::user()->categoria_id;
    
                    $faseCarga = GrupoEvaluacion::create($input);
    
                    return response()->json([
                        'ok' => true,
                        'message' => 'Calificación subida con éxito'
                    ]);
                } catch (\Throwable $th) {
                    return response()->json([
                        'ok' => false,
                        'error' => $th->getMessage()
                    ]);
                }
            }
        }
        
    }
    public function getTeam($id)
    {
        $group = GrupoPersonas::with('Persona')->where('grupo_id', $id)->get();

        return response()->json([
            'ok' => true,
            'data' => $group
        ]);
    }
    public function consultarFase($id)
    {

        $fase = Fase::where("categoria_id", $id)->get();
        return response()->json($fase);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

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
    public function activatePhases(Request $request)
    {
        $input = $request->all();
        if (Fase::where('estado', 0)->first() == null) {
            return response()->json([
                'ok' => false,
                'error' => 'Las fases ya estaban activas'
            ]);
        } else {
            try {
                foreach ($input['data'] as $key => $value) {
                    $dates =  explode(" - ", $value);
                    $fase = Fase::find($key + 1);
                    $fase->update([
                        'fecha_inicio' => $dates[0] . ':00',
                        'fecha_fin' => $dates[1] . ':00'
                    ]);
                }
                return response()->json([
                    'ok' => true,
                    'message' => 'Fases activadas con éxito'
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'ok' => false,
                    'error' => $th->getMessage()
                ]);
            }
        }
    }
}
