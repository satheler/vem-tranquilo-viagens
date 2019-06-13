<?php

use Illuminate\Database\Seeder;

class TarifaIntermunicipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tarifa_intermunicipal')->insert([
            'id' => 1
        ]);

        DB::table('tarifa')->insert([
            'valor' => 0.8,
            'data' =>  now(),
            'description_id' => 1,
            'description_type' => 'App\TarifaIntermunicipal',
        ]);
    }
}
