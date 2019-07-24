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
            $table->char('cumple');            
            $table->unsignedBigInteger('criterio_id');
            $table->unsignedBigInteger('evaluacion_id');
            
            
            $table->foreign('criterio_id')->references('id')->on('tbl_criterio')->onDelete('cascade');
            $table->foreign('evaluacion_id')->references('id')->on('tbl_evaluacion')->onDelete('cascade');

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
