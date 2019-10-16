<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblGrupoEvaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_grupo_evaluacion', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre_jurado',45);
            $table->bigInteger('grupo_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->integer('puntaje');
            $table->bigInteger('fase_id')->unsigned();            
            $table->string('adjunto',200);
            
            $table->foreign('grupo_id')->references('id')->on('tbl_grupo')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('tbl_categoria')->onDelete('cascade');
            $table->foreign('fase_id')->references('id')->on('tbl_fase')->onDelete('cascade');

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
        Schema::dropIfExists('tbl_grupo_evaluacion');
    }
}
