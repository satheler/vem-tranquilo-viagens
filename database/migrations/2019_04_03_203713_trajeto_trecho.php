<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrajetoTrecho extends Migration
{
    private $databaseName = 'trajeto_trecho';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('trajeto_id')->unsigned();
            $table->foreign('trajeto_id')->references('id')->on('trajeto_intermunicipal');

            $table->bigInteger('trecho_id')->unsigned();
            $table->foreign('trecho_id')->references('id')->on('trajeto_trecho');

            $table->time('horarioSaida');
            $table->time('horarioChegada');

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
