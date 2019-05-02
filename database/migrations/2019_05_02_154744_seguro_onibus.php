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
        Schema::create('seguro_onibus', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('seguro_id');
            $table->foreign('seguro_id')->references('id')->on('seguro');

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
        Schema::dropIfExists('seguro_onibus');
    }
}
