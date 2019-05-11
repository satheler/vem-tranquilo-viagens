<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassagemUrbanaTable extends Migration
{
    private $databaseName = 'passagem_urbana';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_venda');

            $table->unsignedBigInteger('alocacao_urbana_id');
            $table->foreign('alocacao_urbana_id')->references('id')->on('alocacao_urbano');


            $table->unsignedBigInteger('valor_id');
            $table->foreign('valor_id')->references('id')->on('tarifa_urbano');//ACho que não pode ser assim

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
        Schema::dropIfExists($this->databaseName);
    }
}
