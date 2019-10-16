<?php

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create( [
            'nombre_categoria'=>'Algoritmia',
            'tipo_agrupacion'=>1,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Bases de Datos',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Desarrollo Web',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Desarrollo Móvil',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Redes y Mantenimiento',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Producción de Multimedia',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Videojuegos',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Animación 3D',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'Produción de Medios Audiovisuales',
            'tipo_agrupacion'=>2,
            ] );
                        
            Categoria::create( [
            'nombre_categoria'=>'IDEATIC',
            'tipo_agrupacion'=>3,
            ] );
    }
}
