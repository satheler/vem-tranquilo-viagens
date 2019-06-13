<?php

use Illuminate\Database\Seeder;

class AlocacaoIntermunicipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alocacao_intermunicipal')->insert([
            'id' => 1,
            'onibus_id' => 4,
            'trajeto_id' => 1,
            'motorista_id' => 1,
            'auxiliar_id' => 1,
            'data' => now(),
            'horarioInicio' => '19:00:00',
            'horarioFim' => '21:00:00',
            'ativo' => true,
        ]);

        DB::table('alocacao_intermunicipal')->insert([
            'id' => 2,
            'onibus_id' => 1,
            'trajeto_id' => 2,
            'motorista_id' => 1,
            'auxiliar_id' => 1,
            'data' => now(),
            'horarioInicio' => '21:15:00',
            'horarioFim' => '23:00:00',
            'ativo' => true,
        ]);
    }
}
