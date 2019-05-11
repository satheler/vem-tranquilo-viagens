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
            'onibus_id' => 1,
            'trajeto_id' => 1,
            'cobrador_id' => 1,
            'motorista_id' => 1,
            'data' => now(),
            'horarioInicio' => '05:30:00',
            'horarioFim' => '05:30:00'
        ]);
    }
}

