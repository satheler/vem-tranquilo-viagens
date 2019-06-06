<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeguroOnibus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguro_funcionario_relacionamento', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('seguro_id');
            $table->foreign('seguro_id')->references('id')->on('seguro_funcionario');

            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('users');

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
        Schema::dropIfExists('seguro_funcionario_relacionamento');
    }
}
