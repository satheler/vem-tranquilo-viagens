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
<<<<<<< HEAD

            $table->unsignedBigInteger('pagamento_id');
            $table->foreign('pagamento_id')->references('id')->on('pagamento_cartao');
=======
            $table->date('data_compra');

            $table->unsignedBigInteger('cartao_id');
            $table->foreign('cartao_id')->references('id')->on('pagamento_cartao');
>>>>>>> master

            $table->unsignedBigInteger('alocacao_intermunicipal_id');
            $table->foreign('alocacao_intermunicipal_id')->references('id')->on('alocacao_intermunicipal');

<<<<<<< HEAD
            // $table->unsignedBigInteger('categoria_passageiro_id');
            // $table->foreign('categoria_passageiro_id')->references('id')->on('categoria_passageiro');
=======
            $table->unsignedBigInteger('assento_id');
            $table->foreign('assento_id')->references('id')->on('assento');

            $table->unsignedBigInteger('categoria_passageiro_id');
            $table->foreign('categoria_passageiro_id')->references('id')->on('categoria_passageiro');

            $table->unsignedBigInteger('tarifa_intermunicipal_id');
            $table->foreign('tarifa_intermunicipal_id')->references('id')->on('tarifa_intermunicipal');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
>>>>>>> master

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
