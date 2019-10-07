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
            $table->boolean('estado')->defualt(0);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            
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
