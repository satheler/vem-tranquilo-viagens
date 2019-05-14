<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlocacaoIntermunicipalTable extends Migration
{
    private $databaseName = 'alocacao_intermunicipal';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('onibus_id');
            $table->foreign('onibus_id')->references('id')->on('onibus_urbano');

            $table->unsignedBigInteger('trajeto_id');
            $table->foreign('trajeto_id')->references('id')->on('trajeto_intermunicipal');

            $table->unsignedBigInteger('motorista_id');
            $table->foreign('motorista_id')->references('id')->on('funcionarios');

            $table->unsignedBigInteger('cobrador_id');
            $table->foreign('cobrador_id')->references('id')->on('funcionarios');

            $table->unsignedBigInteger('auxiliar_id')->nullable();
            $table->foreign('auxiliar_id')->references('id')->on('funcionarios');

            $table->date('data');
            $table->time('horarioInicio');
            $table->time('horarioFim');

            $table->boolean('ativo')->default(true);

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
