<?php

use Illuminate\Database\Seeder;

class FormaDePagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forma_de_pagamento')->insert([
            
            'forma' => "Dinheiro"
        ]);
        DB::table('forma_de_pagamento')->insert([
            'forma' => "Cartão"
        ]);
        
    }
}
