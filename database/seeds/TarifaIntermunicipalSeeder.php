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
            'id' => 1,
            'valor' => 123,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 2,
            'valor' => 203,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 3,
            'valor' => 100,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 4,
            'valor' => 200,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 5,
            'valor' => 250,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 6,
            'valor' => 105,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 7,
            'valor' => 174,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 8,
            'valor' => 50,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 9,
            'valor' => 00,
        ]);
        DB::table('tarifa_intermunicipal')->insert([
            'id' => 10,
            'valor' => 180,
        ]);
    }
}
