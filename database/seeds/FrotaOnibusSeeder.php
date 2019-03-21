<?php

use Illuminate\Database\Seeder;

class FrotaOnibusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frota_onibus')->insert([
            "idfrota" => 1,
            "idonibus" => 2
        ]);

        DB::table('frota_onibus')->insert([
            "idfrota" => 2,
            "idonibus" => 1
        ]);
    }
}
