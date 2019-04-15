<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            'tipo' => 'Convencional'
        ]);

        DB::table('categoria')->insert([
            'tipo' => 'Executivo'
        ]);

        DB::table('categoria')->insert([
            'tipo' => 'Semi Leito'
        ]);

        DB::table('categoria')->insert([
            'tipo' => 'Leito'
        ]);
    }
}
