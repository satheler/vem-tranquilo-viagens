<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaUrbanoTable extends Migration
{
    private $databaseName = "tarifa_urbano";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('licitacao');
            $table->double('valor_especial');

            $table->bigInteger('cidade_id');

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
