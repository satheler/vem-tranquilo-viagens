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

            $table->bigInteger('endereco_id');

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
