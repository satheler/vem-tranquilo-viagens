<?php

use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo')->insert([
            'nome' => 'Motorista'
        ]);
        DB::table('tipo')->insert([
            'nome' => 'Cobrador'
        ]);
        DB::table('tipo')->insert([
            'nome' => 'Auxiliar'
        ]);
    }
}
