<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnibusTable extends Migration
{

    private $databaseName = "onibus";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('disponivel');
            $table->boolean('acessibilidade');
            $table->double('custoManutencao');
            $table->string('chassi', 17);
            $table->string('placa', 7);

            $table->bigInteger('description_id');
            $table->string('description_type');

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
