<?php

use Illuminate\Database\Seeder;

class OnibusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('onibus')->insert([
            'id' => 1,
            'disponivel' => true,
            'acessibilidade' => false,
            'custoManutencao' => 199.20,
            'chassi' => 'G2L5CH64R7K85G5KG',
            'placa' => 'GOV8956'
            ]);

        DB::table('onibus_urbano')->insert([
            'id' => 1,
            'lotacao' => 50,
            'ar_condicionado' => false,
        ]);


        DB::table('onibus')->insert([
            'id' => 2,
            'disponivel' => true,
            'acessibilidade' => true,
            'custoManutencao' => 199.99,
            'chassi' => '25HD6U4A78VOAI9A6',
            'placa' => 'MGJ8741'
        ]);

        DB::table('onibus_urbano')->insert([
            'id' => 2,
            'lotacao' => 25,
            'ar_condicionado' => false,
        ]);
    }
}
