<?php

use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidade')->insert([
            'nome' => 'Alegrete'
        ]);
    }
}
