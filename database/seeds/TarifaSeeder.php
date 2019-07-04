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
            'licitacao' => 'TU 9857',
            'valor_especial' => 0.75,
        ]);


        DB::table('tarifa')->insert([
            'id' => 1,
            'valor' => 1.25,
            'data' =>  '2019-07-04',
            'description_id' => 1,
            'description_type' => 'App\TarifaUrbano',

        ]);

    }
}
