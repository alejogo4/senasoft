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
            $table->char('nombres', 100);
            $table->char('apellidos', 100);
            $table->char('correo', 150);
            $table->char('telefono', 20);
            $table->mediumText('arhivo_proyecto_centro');
            
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
        //
        Schema::drop('tbl_persona');
    }
}
