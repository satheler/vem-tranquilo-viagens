<?php

use Illuminate\Database\Seeder;

class AlocacaoUrbanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alocacao_urbano')->insert([
            'id' => 1,
            'trajeto_id' => 1,
            'onibus_id' => 11,
            'motorista_id' => 1,
            'cobrador_id' => 2,
            'auxiliar_id' => null,
            'horarioInicio' => '05:30',
            'horarioFim' => '09:30',
            'data' => '2019-05-15',
        ]);

    }
}

