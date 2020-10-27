<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',250)->nullable(false);
            $table->string('rua',250)->nullable(true);
            $table->string('numero',250)->nullable(true);
            $table->string('complemento',250)->nullable(true);
            $table->string('bairro',250)->nullable(true);
            $table->string('cidade',250)->nullable(true);
            $table->string('estado',2)->nullable(true);
            $table->boolean('ativo')->nullable(false)->default(true);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel');
    }
}
