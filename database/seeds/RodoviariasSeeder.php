<?php

use Illuminate\Database\Seeder;

class RodoviariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rodoviarias')->insert([
            'logradouro' => "Rua Ónorio Lemes",
            'numero' => 114,
            'bairro' => "Ibirapuitã",
            'cidade_id' => 1,
            'cep' => 97546260,
            'telefone' => 5533221100
        ]);

        DB::table('rodoviarias')->insert([
            'logradouro' => "Rua Sergipe",
            'numero' => 574,
            'bairro' => "Santos Dumont",
            'cidade_id' => 1,
            'cep' => 97547380,
            'telefone' => 5500112233
        ]);
    }
}
