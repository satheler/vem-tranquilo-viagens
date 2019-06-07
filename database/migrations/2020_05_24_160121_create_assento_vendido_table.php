<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssentoVendidoTable extends Migration
{
    private $databaseName = 'assento_vendido';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('assento_id');
            $table->foreign('assento_id')->references('id')->on('assento');

            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')->references('id')->on('venda_online');

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
