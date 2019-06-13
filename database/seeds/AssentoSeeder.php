<?php

use Illuminate\Database\Seeder;

class AssentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assentos_vendidos')->insert([
            'id'=>1,
            'num_assento' => 14,
            'alocacao_id' => 1
        ]);

        DB::table('assentos_vendidos')->insert([
            'id'=> 2,
            'num_assento' => 15,
            'alocacao_id' => 1
        ]);
    }
}
