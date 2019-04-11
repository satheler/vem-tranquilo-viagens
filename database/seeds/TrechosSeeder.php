<?php

use Illuminate\Database\Seeder;

class TrechosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trecho')->insert([
            'horarioSaida' => '12:00:00',
            'horarioChegada' => '13:00:00',
            'quilometragem' => 102.0,
            'origem_id' => 1,
            'destino_id' => 3
        ]);

        DB::table('trecho')->insert([
            'horarioSaida' => '13:05:00',
            'horarioChegada' => '15:30:00',
            'quilometragem' => 174.0,
            'origem_id' => 3,
            'destino_id' => 5
        ]);
    }
}
