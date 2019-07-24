<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEquipo extends Migration
{
    /**artisan 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_equipo', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->char('descripcion' , 45);
            $table->longText('descripcion_actual' , 200);
            $table->char('modelo' , 45);
            $table->char('serial', 45);
            $table->longtext('atributos', 200);
            $table->char('placa_sena', 45);
            $table->longtext('esp_tecnica', 200);
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('centro_id');


            
            $table->foreign('categoria_id')->references('id')->on('tbl_categoria')->onDelete('cascade');
            $table->foreign('centro_id')->references('id')->on('tbl_centro')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_equipo');
    }
}
