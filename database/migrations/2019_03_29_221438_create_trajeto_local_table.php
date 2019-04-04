<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrajetoLocalTable extends Migration
{
    private $dataBaseName = 'trajeto_local';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->dataBaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qntParadas');
            $table->string('terminal');
            $table->time('horarioSaida');
            $table->time('horarioChegada');

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
        Schema::dropIfExists($this->dataBaseName);
    }
}
