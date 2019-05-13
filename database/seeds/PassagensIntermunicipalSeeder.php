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
            'data_compra' => now(),
            'valor' => 122,
            'users_id' => 1,
            'rodoviarias_id' => 1,
            'trajeto_id' => 1,
        
        ]);

        DB::table('passagens_intermunicipal')->insert([
            'id' => 2,
            'data_compra' => now(),
            'valor' => 344,
            'users_id' => 2,
            'rodoviarias_id' => 2,
            'trajeto_id' => 2,
        
        ]);
    }
}
