<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_proyecto', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->mediumText('arhivo_proyecto_centro');
            $table->integer('puntaje')->default('0');
            $table->integer('estado')->default('0');
            $table->timestamps();
            $table->unsignedBigInteger('centro_id');

            $table->foreign('centro_id')->references('id')->on('tbl_centro')->onDelete('cascade');
           

            
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
        Schema::drop('tbl_proyecto');
    }
}
