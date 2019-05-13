<?php

use Illuminate\Database\Seeder;

class PassagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('passagem_urbana')->insert([
            'id'=> 1,
            'data_venda' => now(),
            'alocacao_urbana_id' => 1,
            'categoria_id' => 1
        ]);
    }
}

