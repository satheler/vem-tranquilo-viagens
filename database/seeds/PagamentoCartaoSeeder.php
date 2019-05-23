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
            'titular' => "Judson alvarenga",
            'num_cartao' => 12341231412341234,
            'cvv' => 123,
            'data_validade' => now(),
            'qnt_parcelas' => 5
        ]);


    }
}
