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

        DB::table('onibus_urbano')->insert([
            'id' => 1,
            'lotacao' => 50,
            'arCondicionado' => false,
        ]);

        DB::table('onibus')->insert([
            'id' => 1,
            'description_id' => 1,
            'description_type' => 'App\OnibusUrbano',
            'acessibilidade' => false,
            'chassi' => 'G2L5CH64R7K85G5KG',
            'placa' => 'GOV8956',
            'marca' => 'Mercedes Benz',
            'modelo' => 'OF 1519',
            'data_fabricacao' => now(),
            'data_compra' => now()
        ]);

        /* --------------------------------------------------------- */

        DB::table('onibus_urbano')->insert([
            'id' => 2,
            'lotacao' => 25,
            'arCondicionado' => false,
        ]);

        DB::table('onibus')->insert([
            'id' => 2,
            'description_id' => 2,
            'description_type' => 'App\OnibusUrbano',
            'acessibilidade' => true,
            'chassi' => '25HD6U4A78VOAI9A6',
            'placa' => 'MGJ8741',
            'marca' => 'Mercedes Benz',
            'modelo' => 'OF 1519',
            'data_fabricacao' => now(),
            'data_compra' => now()
        ]);
    }
}
