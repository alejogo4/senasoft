<?php

use App\Models\Fase;
use App\Models\Porcentaje;
use Illuminate\Database\Seeder;

class PorcentajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fase::create([
            'nombre'=>'fase 1'
        ]);
        Fase::create([
            'nombre'=>'fase 2'
        ]);
        Fase::create([
            'nombre'=>'fase 3'
        ]);
        Fase::create([
            'nombre'=>'fase 4'
        ]);

        // Algoritmia
        Porcentaje::create([
            'categoria_id'=>1,
            'fase_id'=>1,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>1,
            'fase_id'=>2,
            'porcentaje'=>30
        ]);
        Porcentaje::create([
            'categoria_id'=>1,
            'fase_id'=>3,
            'porcentaje'=>30
        ]);
        Porcentaje::create([
            'categoria_id'=>1,
            'fase_id'=>4,
            'porcentaje'=>20
        ]);
        
        // Bases de datos 
        Porcentaje::create([
            'categoria_id'=>2,
            'fase_id'=>1,
            'porcentaje'=>25
        ]);
        Porcentaje::create([
            'categoria_id'=>2,
            'fase_id'=>2,
            'porcentaje'=>25
        ]);
        Porcentaje::create([
            'categoria_id'=>2,
            'fase_id'=>3,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>2,
            'fase_id'=>4,
            'porcentaje'=>30
        ]);
        
    }
}
