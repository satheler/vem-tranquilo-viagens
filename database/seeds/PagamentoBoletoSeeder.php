<?php

use Illuminate\Database\Seeder;

class PagamentoBoletoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagamento_boleto')->insert([
            'valor' => 1143,
            'data_validade' => now()
        
        ]);

    }
}
