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

        // Desarrollo web 
        Porcentaje::create([
            'categoria_id'=>3,
            'fase_id'=>1,
            'porcentaje'=>30
        ]);
        Porcentaje::create([
            'categoria_id'=>3,
            'fase_id'=>2,
            'porcentaje'=>30
        ]);
        Porcentaje::create([
            'categoria_id'=>3,
            'fase_id'=>3,
            'porcentaje'=>30
        ]);
        Porcentaje::create([
            'categoria_id'=>3,
            'fase_id'=>4,
            'porcentaje'=>10
        ]);

        // Desarrollo móvil 
        Porcentaje::create([
            'categoria_id'=>4,
            'fase_id'=>1,
            'porcentaje'=>25
        ]);
        Porcentaje::create([
            'categoria_id'=>4,
            'fase_id'=>2,
            'porcentaje'=>25
        ]);
        Porcentaje::create([
            'categoria_id'=>4,
            'fase_id'=>3,
            'porcentaje'=>25
        ]);
        Porcentaje::create([
            'categoria_id'=>4,
            'fase_id'=>4,
            'porcentaje'=>25
        ]);
        
        // Redes y mantenimiento
        Porcentaje::create([
            'categoria_id'=>5,
            'fase_id'=>1,
            'porcentaje'=>40
        ]);
        Porcentaje::create([
            'categoria_id'=>5,
            'fase_id'=>2,
            'porcentaje'=>10
        ]);
        Porcentaje::create([
            'categoria_id'=>5,
            'fase_id'=>3,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>5,
            'fase_id'=>4,
            'porcentaje'=>30
        ]);

        // Producción multimedia
        Porcentaje::create([
            'categoria_id'=>6,
            'fase_id'=>1,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>6,
            'fase_id'=>2,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>6,
            'fase_id'=>3,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>6,
            'fase_id'=>4,
            'porcentaje'=>40
        ]);

        // Videojuegos
        Porcentaje::create([
            'categoria_id'=>7,
            'fase_id'=>1,
            'porcentaje'=>50
        ]);
        Porcentaje::create([
            'categoria_id'=>7,
            'fase_id'=>2,
            'porcentaje'=>10
        ]);
        Porcentaje::create([
            'categoria_id'=>7,
            'fase_id'=>3,
            'porcentaje'=>15
        ]);
        Porcentaje::create([
            'categoria_id'=>7,
            'fase_id'=>4,
            'porcentaje'=>25
        ]);

        // Animación 3D
        Porcentaje::create([
            'categoria_id'=>8,
            'fase_id'=>1,
            'porcentaje'=>40
        ]);
        Porcentaje::create([
            'categoria_id'=>8,
            'fase_id'=>2,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>8,
            'fase_id'=>3,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>8,
            'fase_id'=>4,
            'porcentaje'=>20
        ]);

        // Producción medios audiovisuales
        Porcentaje::create([
            'categoria_id'=>9,
            'fase_id'=>1,
            'porcentaje'=>15
        ]);
        Porcentaje::create([
            'categoria_id'=>9,
            'fase_id'=>2,
            'porcentaje'=>15
        ]);
        Porcentaje::create([
            'categoria_id'=>9,
            'fase_id'=>3,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>9,
            'fase_id'=>4,
            'porcentaje'=>30
        ]);

        // IDEATIC
        Porcentaje::create([
            'categoria_id'=>10,
            'fase_id'=>1,
            'porcentaje'=>15
        ]);
        Porcentaje::create([
            'categoria_id'=>10,
            'fase_id'=>2,
            'porcentaje'=>15
        ]);
        Porcentaje::create([
            'categoria_id'=>10,
            'fase_id'=>3,
            'porcentaje'=>20
        ]);
        Porcentaje::create([
            'categoria_id'=>10,
            'fase_id'=>4,
            'porcentaje'=>50
        ]);
    }
}
