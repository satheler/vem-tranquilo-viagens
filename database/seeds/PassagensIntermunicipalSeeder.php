<?php

use Illuminate\Database\Seeder;

class PassagensIntermunicipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('passagens_intermunicipal')->insert([
            'id' => 1,
            'valor' => 122,
            'users_id' => 1,
            'alocacao_id' => 1
                   
        ]);

        DB::table('passagens_intermunicipal')->insert([
            'id' => 2,
            'valor' => 344,
            'users_id' => 1,
            'alocacao_id' => 2
        ]);
    }
}
