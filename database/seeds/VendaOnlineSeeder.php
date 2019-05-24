<?php

use Illuminate\Database\Seeder;

class VendaOnlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venda_online')->insert([
            'data_compra' => now(),
            'cartao_id' => 1,
            'cliente_id' => 1,
            'alocacao_intermunicipal_id' => 1,
            'assento_id' => 1,
            'categoria_passageiro_id' => 1,
            'tarifa_intermunicipal_id' => 1,
        ]);
    }
}
