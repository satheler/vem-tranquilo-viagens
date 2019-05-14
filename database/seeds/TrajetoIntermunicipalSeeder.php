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
            "id" => 1
        ]);

        DB::table('trajeto_trecho')->insert([ "trajeto_id" => 1, "trecho_id" => 1, "horarioSaida" => "12:05:00", "horarioChegada" => "13:00:00" ]);
        DB::table('trajeto_trecho')->insert([ "trajeto_id" => 1, "trecho_id" => 2, "horarioSaida" => "13:15:00", "horarioChegada" => "15:00:00" ]);


        DB::table('trajeto_intermunicipal')->insert([
            "id" => 2
        ]);

        DB::table('trajeto_trecho')->insert([ "trajeto_id" => 2, "trecho_id" => 1, "horarioSaida" => "00:00:00", "horarioChegada" => "01:05:00" ]);
        DB::table('trajeto_trecho')->insert([ "trajeto_id" => 2, "trecho_id" => 2, "horarioSaida" => "01:10:00", "horarioChegada" => "03:00:00" ]);
        DB::table('trajeto_trecho')->insert([ "trajeto_id" => 2, "trecho_id" => 3, "horarioSaida" => "03:15:00", "horarioChegada" => "06:00:00" ]);
    }
}
