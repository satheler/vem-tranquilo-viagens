<?php

use Illuminate\Database\Seeder;
use Faker\Provider\cs_CZ\DateTime;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.php
     *
     * @return void
     */
    public function run()
    {

        DB::table('tarifa_local')->insert([
            'id' => 1,
            'cidade' => 'Alegrete',
            'licitacao' => 'test',
            'valor_especial' => 3.50,
        ]);

        DB::table('tarifa')->insert([
            'id' => 1,
            'valor' => 2.00,
            'data' =>  date('Y-m-d'),
            'description_id' => 1,
            'description_type' => 'App\Tarifa',
            
        ]);

        DB::table('tarifa_local')->insert([
            'id' => 2,
            'cidade' => 'Uruguaiana',
            'licitacao' => 'test',
            'valor_especial' => 3.75,
        ]);

        DB::table('tarifa')->insert([
            'id' => 2,
            'valor' => 2.50,
            'data' =>  date('Y-m-d'),
            'description_id' => 2,
            'description_type' => 'App\Tarifa',
            
        ]);
       
    }
}