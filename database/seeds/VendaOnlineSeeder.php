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
            'forma_pagamento' => true,
            'num_assento' => 10,
            'alocacao_id' => 1,
            'assento_id' => 1,
            'categoria_passageiro' => 1,
            'tarifa_intermunicipal_id' => 1,
        ]);
    }
}
