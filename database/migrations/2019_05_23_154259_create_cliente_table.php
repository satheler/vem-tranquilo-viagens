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
            $table->string('senha');
            $table->string('confirmar_senha');
            $table->string('email')->unique();
            $table->string('confirmar_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('telefone');
            $table->bigInteger('celular');
            $table->bigInteger('cep');
            $table->string('rua');
            $table->integer('numero');
            $table->string('bairro');
            $table->string('complemento');
            $table->string('estado');

            $table->rememberToken();
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
