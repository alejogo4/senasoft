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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->char('documento', 20)->nullable();
            $table->char('tipo_documento', 60)->nullable();
            $table->char('nombres', 100)->nullable();
            $table->char('apellidos', 100)->nullable();
            $table->char('fecha_nacimiento', 100)->nullable();
            $table->char('foto', 250)->nullable();
            $table->char('ficha', 20)->nullable();
            $table->char('correo_principal', 150)->nullable();
            $table->char('correo_alterno', 150)->nullable();
            $table->char('telefono', 20)->nullable();
            $table->char('otro_telefono', 20)->nullable();
            $table->char('cargo', 60)->nullable();
            $table->string('programa_formacion', 250)->nullable();
            $table->char('rh', 3)->nullable();
            $table->char('talla_camisa', 3)->nullable();
            $table->char('eps', 80)->nullable();
            $table->char('arl', 60)->nullable();
            $table->char('tipo_contrato', 15)->nullable();
            $table->string('ciudad', 250)->nullable();
            $table->string('ciudad_desplazamiento_aereo', 250)->nullable();
            $table->char('empresa', 80)->nullable();
            $table->mediumText('tipo_alimentacion', 20)->nullable();
            $table->mediumText('alergias')->nullable();
            $table->mediumText('enfermedades')->nullable();
            $table->mediumText('medicamento_consume')->nullable();
            $table->mediumText('arhivo_documento')->nullable();
            $table->mediumText('arhivo_certificado_eps')->nullable();
            $table->mediumText('arhivo_constancia_estudio')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->unsignedBigInteger('centro_id')->nullable();
            $table->unsignedBigInteger('tipo_persona')->nullable();
            $table->boolean('revision')->default(0);
            $table->timestamps();

            // $table->foreign('categoria_id')->references('id')->on('tbl_categoria')->onDelete('cascade');
            // $table->foreign('centro_id')->references('id')->on('tbl_centro')->onDelete('cascade');
            // $table->foreign('tipo_persona')->references('id')->on('tbl_tipo_persona')->onDelete('cascade');
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
