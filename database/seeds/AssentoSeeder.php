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
        // DB::table('assento')->insert([
        //     'id'=>3,
        //     'num_assento' => 20,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>4,
        //     'num_assento' => 17,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>5,
        //     'num_assento' => 5,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>6,
        //     'num_assento' => 24,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>7,
        //     'num_assento' => 30,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>8,
        //     'num_assento' => 35,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>9,
        //     'num_assento' => 22,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>10,
        //     'num_assento' => 3,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>11,
        //     'num_assento' => 8,
        //     'ocupado' => false,

        // ]);
        // DB::table('assento')->insert([
        //     'id'=>12,
        //     'num_assento' => 23,
        //     'ocupado' => false,

        // ]);
    }
}
