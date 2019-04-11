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
        DB::table('Cidades')->insert([
            'nome' => 'Alegrete'
        ]);
        DB::table('Cidades')->insert([
            'nome' => 'Passo Novo'
        ]);
        DB::table('Cidades')->insert([
            'nome' => 'Manoel Viana'
        ]);
        DB::table('Cidades')->insert([
            'nome' => 'Rosário do Sul'
        ]);
        DB::table('Cidades')->insert([
            'nome' => 'Santa Maria'
        ]);
        DB::table('Cidades')->insert([
            'nome' => 'São Gabriel'
        ]);
        DB::table('Cidades')->insert([
            'nome' => 'Porto Alegre'
        ]);
    }
}
