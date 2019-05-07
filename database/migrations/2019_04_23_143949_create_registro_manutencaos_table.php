<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroManutencaosTable extends Migration
{

    private $databaseName = 'registro_manutencao';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('motivo');
            $table->double('valor')->nullable();
            $table->string('observacao')->nullable();

            $table->unsignedBigInteger('onibus_id');
            $table->foreign('onibus_id')->references('id')->on('onibus');

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
