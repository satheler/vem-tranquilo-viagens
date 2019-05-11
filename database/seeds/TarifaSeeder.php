<?php

use Illuminate\Database\Seeder;
use Faker\Provider\cs_CZ\DateTime;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.php
     *
     * @return void
     */
    public function run()
    {

        DB::table('tarifa_urbano')->insert([
            'cidade_id' => 1,
            'licitacao' => 'test',
            'valor_especial' => 3.50,
        ]);

        DB::table('tarifa')->insert([
            'id' => 1,
            'valor' => 2.00,
            'data' =>  now(),
            'description_id' => 1,
            'description_type' => 'App\TarifaUrbano',

        ]);
    }
}
