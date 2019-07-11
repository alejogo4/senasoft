<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEvaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fecha');
            $table->char('nombre_lider');
            $table->char('nombre_jurado');
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('centro_id');
            
            $table->foreign('grupo_id')->references('id')->on('tbl_grupo')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_evaluacion');
    }
}
