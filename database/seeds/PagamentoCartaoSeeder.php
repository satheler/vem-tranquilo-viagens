<?php

use Illuminate\Database\Seeder;

class PagamentoCartaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagamento_cartao')->insert([
            'valor' => 50,
            'num_cartao' => '4512',
            'data' => now()->format('Y-m-d'),
            'qnt_parcelas' => 2
        ]);


    }
}
