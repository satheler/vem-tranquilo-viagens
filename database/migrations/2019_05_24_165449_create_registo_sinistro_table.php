<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistoSinistroTable extends Migration
{
    private $databaseName = 'registro_sinistro';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function(Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('tipo_causa');
            $table->string('descricao_causa');
            $table->string('envolvidos');
            $table->float('custo');
            $table->string('descricao_custo');
            $table->date('data');
            
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
