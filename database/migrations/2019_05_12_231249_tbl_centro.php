<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCentro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('tbl_centro', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->char('nombre_centro', 100); 
            $table->unsignedBigInteger('regional_id');
            $table->char('codigo', 45);
            
            $table->boolean('estado_registros');
            $table->boolean('estado_proyectos');
            $table->boolean('estado_equipos');
            $table->integer('ideatic');

            $table->timestamps();

            $table->foreign('regional_id')->references('id')->on('tbl_regional')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('tbl_centro');
    }
}
