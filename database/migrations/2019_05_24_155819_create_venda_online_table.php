<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaOnlineTable extends Migration
{
    private $databaseName = 'venda_online';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->databaseName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('pagamento_id');
            $table->foreign('pagamento_id')->references('id')->on('pagamento_cartao');

            $table->unsignedBigInteger('alocacao_intermunicipal_id');
            $table->foreign('alocacao_intermunicipal_id')->references('id')->on('alocacao_intermunicipal');

            $table->unsignedBigInteger('categoria_passageiro_id');
            $table->foreign('categoria_passageiro_id')->references('id')->on('categoria_passageiro');

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
