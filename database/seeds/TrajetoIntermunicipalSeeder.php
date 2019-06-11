<?php

use Illuminate\Database\Seeder;

class TrajetoIntermunicipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trajeto_intermunicipal')->insert([
            "id" => 1,
        ]);

        DB::table('trechos')->insert(['trajeto_id' => 1, 'cidade_id' => 1, 'horarioSaida' => '13:00:00', 'horarioChegada' => '15:05:00', 'quilometragem' => 0, 'ordem' => 0]);
        DB::table('trechos')->insert(['trajeto_id' => 1, 'cidade_id' => 5, 'horarioSaida' => '15:20:00', 'horarioChegada' => '18:00:00', 'quilometragem' => 200.0, 'ordem' => 1]);
        DB::table('trechos')->insert(['trajeto_id' => 1, 'cidade_id' => 7, 'horarioSaida' => '18:00:00', 'horarioChegada' => '18:00:00', 'quilometragem' => 315.0, 'ordem' => 2]);


        DB::table('trajeto_intermunicipal')->insert([
            "id" => 2,
        ]);

        DB::table('trechos')->insert(['trajeto_id' => 2, 'cidade_id' => 1, 'horarioSaida' => '13:00:00', 'horarioChegada' => '17:00:00', 'quilometragem' => 0, 'ordem' => 0]);
        DB::table('trechos')->insert(['trajeto_id' => 2, 'cidade_id' => 7, 'horarioSaida' => '17:00:00', 'horarioChegada' => '17:00:00', 'quilometragem' => 500.0, 'ordem' => 1]);


        DB::table('trajeto_intermunicipal')->insert([
            "id" => 3,
        ]);

        DB::table('trechos')->insert(['trajeto_id' => 3, 'cidade_id' => 1, 'horarioSaida' => '00:00:00', 'horarioChegada' => '01:25:00', 'quilometragem' => 0, 'ordem' => 0]);
        DB::table('trechos')->insert(['trajeto_id' => 3, 'cidade_id' => 3, 'horarioSaida' => '01:30:00', 'horarioChegada' => '03:40:00', 'quilometragem' => 250, 'ordem' => 1]);
        DB::table('trechos')->insert(['trajeto_id' => 3, 'cidade_id' => 5, 'horarioSaida' => '04:00:00', 'horarioChegada' => '06:00:00', 'quilometragem' => 400, 'ordem' => 2]);
        DB::table('trechos')->insert(['trajeto_id' => 3, 'cidade_id' => 7, 'horarioSaida' => '06:00:00', 'horarioChegada' => '06:00:00', 'quilometragem' => 530.0, 'ordem' => 3]);
    }
}
