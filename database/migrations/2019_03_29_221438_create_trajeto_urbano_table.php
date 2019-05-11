<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrajetoUrbanoTable extends Migration
{
    private $dataBaseName = 'trajeto_urbano';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->dataBaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qntParadas');
            $table->string('terminal');
            $table->time('horarioSaida');
            $table->time('horarioChegada');
            $table->float('quilometragem');

            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->unsignedBigInteger('tarifa_id');
            $table->foreign('tarifa_id')->references('id')->on('tarifa_urbano');

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
        Schema::dropIfExists($this->dataBaseName);
    }
}
