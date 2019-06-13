<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssentoVendidoTable extends Migration
{
    private $databaseName = 'assentos_vendidos';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->Integer('num_assento');

            $table->unsignedBigInteger('alocacao_id');
            $table->foreign('alocacao_id')->references('id')->on('alocacao_intermunicipal');

            $table->unsignedBigInteger('venda_id')->nullable();
            $table->foreign('venda_id')->references('id')->on('venda_online');

            $table->unsignedBigInteger('vendarodoviaria_id')->nullable();
            $table->foreign('vendarodoviaria_id')->references('id')->on('passagens_intermunicipal');

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
