<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaOnlineTable extends Migration
{
    private $databaseName = 'venda_online';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_compra');
            $table->boolean('forma_pagamento');
            
            $table->unsignedBigInteger('alocacao_id');
            $table->foreign('alocacao_id')->references('id')->on('alocacao_intermunicipal');
            
            $table->unsignedBigInteger('assento_id');
            $table->foreign('assento_id')->references('id')->on('assento');
            
            $table->unsignedBigInteger('categoria_onibus_id');
            $table->foreign('categoria_onibus_id')->references('id')->on('categoria_onibus');
            
            $table->unsignedBigInteger('categoria_passageiro_id');
            $table->foreign('categoria_passageiro_id')->references('id')->on('categoria_passageiro');
            
            $table->unsignedBigInteger('tarifa_intermunicipal_id');
            $table->foreign('tarifa_intermunicipal_id')->references('id')->on('tarifa_intermunicipal');
            
            
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            
            
            
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
