<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblGrupoPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_grupo_persona', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('grupo_id');

            $table->foreign('persona_id')->references('id')->on('tbl_persona')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('tbl_grupo')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_grupo_persona');
    }
}
