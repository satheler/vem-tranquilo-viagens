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
            'onibus_id' => 1,
            'trajeto_id' => 1,
            'motorista_id' => 1,
            'auxiliar_id' => 1,
            'data' => now(),
            'horarioInicio' => now(),
            'horarioFim' => now(),
            'ativo' => true,
        ]);
    }
}
