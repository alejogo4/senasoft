<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorcentajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_porcentaje', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fase_id');
            $table->unsignedBigInteger('categoria_id');
            $table->integer('porcentaje');

            $table->foreign('fase_id')->references('id')->on('tbl_fase');
            $table->foreign('categoria_id')->references('id')->on('tbl_categoria');
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
        Schema::dropIfExists('tbl_porcentaje');
    }
}
