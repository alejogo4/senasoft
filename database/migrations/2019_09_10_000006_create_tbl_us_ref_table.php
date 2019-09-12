<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTblUsRefTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tbl_us_ref';
    /**
     * Run the migrations.
     * @table tbl_us_ref
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
    
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('refrigerios_id');
            $table->integer('estado')->nullable();
            $table->foreign('persona_id')->references('id')->on('tbl_persona')->onDelete('cascade');
            $table->foreign('refrigerios_id')->references('id')->on('tbl_refrigerio')->onDelete('cascade');
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