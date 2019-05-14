<?php

use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert([
            'nome' => 'Alegrete'
        ]);
        DB::table('cidades')->insert([
            'nome' => 'Passo Novo'
        ]);
        DB::table('cidades')->insert([
            'nome' => 'Manoel Viana'
        ]);
        DB::table('cidades')->insert([
            'nome' => 'Rosário do Sul'
        ]);
        DB::table('cidades')->insert([
            'nome' => 'Santa Maria'
        ]);
        DB::table('cidades')->insert([
            'nome' => 'São Gabriel'
        ]);
        DB::table('cidades')->insert([
            'nome' => 'Porto Alegre'
        ]);
    }
}
