<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnibusIntermunicipalTable extends Migration
{

    private $databaseName = "onibus_intermunicipal";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('banheiro');

            $table->unsignedBigInteger('categoria_onibus_id');
            $table->foreign('categoria_onibus_id')->references('id')->on('categoria_onibus');

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
