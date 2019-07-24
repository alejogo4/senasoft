<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblFase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fase', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->char('nombre' , 45);
            $table->integer('porcentaje')->default(0);
            $table->unsignedBigInteger('categoria_id');


            $table->foreign('categoria_id')->references('id')->on('tbl_categoria')->onDelete('cascade');




            
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
        Schema::dropIfExists('tbl_fase');
    }
}
