<?php

use Illuminate\Database\Seeder;

class OnibusUrbanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('onibus_urbano')->insert([
            'id' => 11,
            'lotacao' => 50,
            'cidade_id' => 1,
            'arCondicionado' => false,
        ]);

        DB::table('onibus')->insert([
            'id' => 11,
            'description_id' => 2,
            'description_type' => 'App\OnibusUrbano',
            'acessibilidade' => false,
            'chassi' => 'O2L5CH64R7K85G5KG',
            'placa' => 'GOV8956',
            'marca' => 'Mercedes Benz',
            'modelo' => 'OF 1519',
            'data_fabricacao' => now(),
            'data_compra' => now()
        ]);
    }
}
