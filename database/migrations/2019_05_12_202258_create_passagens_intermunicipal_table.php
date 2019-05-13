<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassagensIntermunicipalTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passagens_intermunicipal', function (Blueprint $table) {
            $table->bigIncrements('id');
          
            $table->date('data_compra');
            $table->timestamp('hora_compra')->default(now());
            $table->float('valor');
            
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('rodoviarias_id');
            $table->foreign('rodoviarias_id')->references('id')->on('rodoviarias');

            
            $table->unsignedBigInteger('trajeto_id');
            $table->foreign('trajeto_id')->references('id')->on('trajeto_intermunicipal');
         
          

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
        Schema::dropIfExists('passagens_intermunicipal');
    }
}
