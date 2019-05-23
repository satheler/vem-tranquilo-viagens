<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrechosTable extends Migration
{
    private $databaseName = 'trechos';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('trajeto_id');
            $table->foreign('trajeto_id')->references('id')->on('trajeto_intermunicipal');

            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->time('horarioSaida')->nullable();
            $table->time('horarioChegada')->nullable();
            $table->float('quilometragem');
            $table->integer('ordem');

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
