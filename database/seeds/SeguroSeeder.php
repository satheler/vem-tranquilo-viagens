<?php

use Illuminate\Database\Seeder;

class SeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seguro')->insert([
            'id' => 1,
            'empresa' => 'VemTranquiloSeguros',
            'valor' => 100,
            'assegura' => 'Acidentes na rodovia',
            'tipo_id' => '1',
            'data_inicio' => '2019-05-02',
            'data_vigencia' => '2019-05-03',
            'vigente' => true
        ]);
    }
}
