<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblFecha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fecha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps('fecha_inicio');
            $table->timestamps('fecha_fin');
            $table->char('fase');
            
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
        Schema::dropIfExists('tbl_fecha');
    }
}
