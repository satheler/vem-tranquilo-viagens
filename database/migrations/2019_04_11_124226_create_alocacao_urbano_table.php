<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlocacaoUrbanoTable extends Migration
{
    private $databaseName = 'alocacao_urbano';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('onibus_id');
            $table->bigInteger('trajeto_id');
            $table->bigInteger('cobrador_id');
            $table->bigInteger('motorista_id');

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
