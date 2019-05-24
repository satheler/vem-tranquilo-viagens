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
            'valor' => 12321,
            'ocupado' => true,
          
        ]);
    }
}
