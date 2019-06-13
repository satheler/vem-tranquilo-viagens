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
            'tipo' => 'estudante',
            'desconto' => 10,
          
        ]);
    
    }
}
