<?php

namespace App\Exports;

use App\Models\Persona;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PersonasExport implements FromView
{
    public function view(): View
    {
        $persona = Persona::with(["Centro", "Centro.Regional", "Categoria", "TipoPersona"])
        ->orderBy("centro_id")
        ->orderBy("tipo_persona")
        ->get();

        // dd($persona);

        return view('app.registro.excel', [
            'datos' => $persona
        ]);
    }
}