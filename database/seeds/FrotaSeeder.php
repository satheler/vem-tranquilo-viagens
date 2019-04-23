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
            'id' => 1,
            'nome' => 'Frota1',
            'seguro_id' => 1
        ]);
        
        DB::table('frota')->insert([
            'id' => 2,
            'nome' => 'Frota2',
            'seguro_id' => 1
        ]);
    }
}
