<?php

use Illuminate\Database\Seeder;

class TrajetoUrbanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trajeto_urbano')->insert([
            "qntParadas" => 3,
            "terminal" => "Santos Dumont 1",
            "horarioSaida" => '08:30:00',
            "horarioChegada" => '09:15:00',
            "quilometragem" => "5.00",
            "cidade_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('trajeto_urbano')->insert([
            "qntParadas" => 3,
            "terminal" => "Santos Dumont 2",
            "horarioSaida" => '08:35:00',
            "horarioChegada" => '09:20:00',
            "quilometragem" => "4.50",
            "cidade_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('trajeto_urbano')->insert([
            "qntParadas" => 1,
            "terminal" => "Ibirapuitã 1",
            "horarioSaida" => '08:45:00',
            "horarioChegada" => '09:30:00',
            "quilometragem" => "3.00",
            "cidade_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
