<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrechoTable extends Migration
{

    private $databaseName = 'trecho';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('quilometragem');

            $table->bigInteger('origem_id')->unsigned();
            $table->foreign('origem_id')->references('id')->on('cidades');

            $table->bigInteger('destino_id')->unsigned();
            $table->foreign('destino_id')->references('id')->on('cidades');

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
