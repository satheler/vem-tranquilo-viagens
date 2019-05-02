<?php

use Illuminate\Database\Seeder;

class SeguroOnibusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seguro_onibus')->insert([
            'id' => 1,
            'onibus_id' => 1,
            'seguro_id' => 1
        ]);
    }
}
