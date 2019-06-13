<?php

use Illuminate\Database\Seeder;

class CategoriaPassageiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        DB::table('categoria_passageiro')->insert([
            'id' => 1,
            'tipo' => 'Normal',
            'desconto' => 00,
          
        ]);
        DB::table('categoria_passageiro')->insert([
            'id' => 2,
            'tipo' => 'estudante',
            'desconto' => 10,
          
        ]);
        DB::table('categoria_passageiro')->insert([
            'id' => 3,
            'tipo' => 'idoso',
            'desconto' => 50,
          
        ]);
        DB::table('categoria_passageiro')->insert([
            'id' => 4,
            'tipo' => 'especial',
            'desconto' => 100,
          
        ]);
    }
}
