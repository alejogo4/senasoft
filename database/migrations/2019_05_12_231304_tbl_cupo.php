<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_cupo', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->integer('n_cupos_disponibles');
            $table->integer('n_cupos_utilizados');
            $table->char('codigo', 45);
            $table->timestamps();

            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('centro_id')->references('id')->on('tbl_centro')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('tbl_categoria');
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
        Schema::drop('tbl_cupo');
    }
}
