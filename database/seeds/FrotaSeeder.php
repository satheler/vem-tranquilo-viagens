<?php

use Illuminate\Database\Seeder;

class FrotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frota')->insert([
            "nome" => "Alegrete"
        ]);

        DB::table('frota')->insert([
            "nome" => "Qualquer coisa"
        ]);
    }
}
