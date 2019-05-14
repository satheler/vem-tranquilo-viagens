<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRodoviariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rodoviarias', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('logradouro');
            $table->integer('numero');
            $table->string('bairro');

            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->integer('cep');
            $table->bigInteger('telefone');

            $table->boolean('ativa')->default(true);

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
        Schema::dropIfExists('rodoviarias');
    }
}
