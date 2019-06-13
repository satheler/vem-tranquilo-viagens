<?php

use Illuminate\Database\Seeder;

class RegistroSinistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registro_sinistro')->insert([
            'tipo_causa' => 'incêndio',
            'descricao_causa' => ' pegou fogo no onibus na avenida tal, tal , tal, aconteceu isso, isso, isso',
            'envolvidos' => 'motorista, cobrador, 23 envolvidos no acidente',
            'custo' => 122211,
            'descricao_custo' => 'perda total',
            'data' => now(),
            'responsavel_custo' => 'seguradora',
            'onibus_id' => 1

        ]);

        DB::table('registro_sinistro')->insert([
            'tipo_causa' => 'motor',
            'descricao_causa' => ' o motor parou de funcionar durante a viajem',
            'envolvidos' => 'motorista, cobrador, 23 envolvidos no acidente',
            'custo' => 15000,
            'descricao_custo' => 'bateu o motor, precisa fazer um motor novo',
            'data' => now(),
            'responsavel_custo' =>'prefeitura',
            'onibus_id' => 2

        ]);
    }
}
