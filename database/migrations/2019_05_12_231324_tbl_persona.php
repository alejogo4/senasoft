<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_persona', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->char('documento', 20);
            $table->char('tipo_documento', 10);
            $table->char('nombres', 100);
            $table->char('apellidos', 100);
            $table->char('fecha_nacimiento', 100);
            $table->char('foto', 250);
            $table->char('ficha', 20);
            $table->char('correo_principal', 150);
            $table->char('correo_alterno', 150);
            $table->char('telefono', 20);
            $table->char('otro_telefono', 20);
            $table->char('cargo', 60);
            $table->char('rh', 3);
            $table->char('talla_camisa', 3);
            $table->char('eps', 45);
            $table->char('arl', 60);
            $table->char('tipo_contrato', 15);
            $table->char('ciudad', 60);
            $table->char('ciudad_desplazamiento_aereo', 60);
            $table->char('empresa', 80);
            $table->mediumText('tipo_alimentacion', 20);
            $table->mediumText('alergias');
            $table->mediumText('enfermedades');
            $table->mediumText('medicamento_consume');
            $table->mediumText('arhivo_documento');
            $table->mediumText('arhivo_certificado_eps');
            $table->mediumText('arhivo_constancia_estudio');
            $table->unsignedBigInteger('asignacion_cupos_id');
            $table->unsignedBigInteger('tipo_persona');
            $table->boolean('tour');
            $table->timestamps();

            $table->foreign('asignacion_cupos_id')->references('id')->on('tbl_cupo')->onDelete('cascade');
            $table->foreign('tipo_persona')->references('id')->on('tbl_tipo_persona')->onDelete('cascade');
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
