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
        DB::table('assento')->insert([
            'id'=>1,
            'num_assento' => 14,
            'ocupado' => true,
          
        ]);

        DB::table('assento')->insert([
            'id'=>2,
            'num_assento' => 15,
            'ocupado' => false,
          
        ]);
    }
}
