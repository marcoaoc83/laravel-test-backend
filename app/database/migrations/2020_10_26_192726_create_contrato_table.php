<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('propriedade')->unsigned()->nullable(false);
            $table->foreign('propriedade')->references('id')->on('imovel');
            $table->char('tipo_pessoa',1)->nullable(false);
            $table->string('documento',50)->nullable(false);
            $table->string('email',250)->nullable(false);
            $table->string('nome',250)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato');
    }
}
