<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassagensIntermunicipalTable extends Migration
{
private $databaseName = 'passagens_intermunicipal';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
          
            $table->float('valor');
        
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
   
            $table->unsignedBigInteger('alocacao_id');
            $table->foreign('alocacao_id')->references('id')->on('alocacao_intermunicipal');
         
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
