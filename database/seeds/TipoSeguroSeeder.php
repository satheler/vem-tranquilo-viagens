<?php

use Illuminate\Database\Seeder;

class TipoSeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_seguro')->insert([
            'id' => 1,
            'nome' => 'Comum'
        ]);
    }
}
