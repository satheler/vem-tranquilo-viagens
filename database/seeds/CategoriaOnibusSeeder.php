<?php

use Illuminate\Database\Seeder;

class CategoriaOnibusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_onibus')->insert([
            'categoria' => "Comum"
        ]);
        DB::table('categoria_onibus')->insert([
            'categoria' => "Leito"
        ]);
        DB::table('categoria_onibus')->insert([
            'categoria' => "Semi-leito"
        ]);
    }
}
