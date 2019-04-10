<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaOnibus extends Migration
{
    private $databaseName = 'categoria_onibus';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria');
            $table->float('valor');
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
