<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    private $databaseName = 'cliente';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('cpf');
            $table->bigInteger('senha');
            $table->bigInteger('confirmar_senha');
            $table->string('email');
            $table->string('confirmar_email');
            $table->bigInteger('telefone');
            $table->bigInteger('celular');
            $table->bigInteger('cep');
            $table->string('rua');
            $table->integer('numero');
            $table->string('bairro');
            $table->string('complemento');
            $table->string('estado');
            
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
