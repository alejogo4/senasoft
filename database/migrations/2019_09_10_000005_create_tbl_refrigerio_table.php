<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTblRefrigerioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tbl_refrigerio';
    /**
     * Run the migrations.
     * @table tbl_refrigerio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_inicial')->nullable();
            $table->dateTime('fecha_final')->nullable();
            $table->unsignedBigInteger('tipo_ref_id');
            $table->foreign('tipo_ref_id')->references('id')->on('tbl_tipo_refrigerio')->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}