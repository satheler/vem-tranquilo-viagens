<?php

use Illuminate\Database\Seeder;

class OnibusIntermunicipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('onibus_intermunicipal')->insert([
            'id' => 1,
            'categoria' => leito,
            'frota_id' => 1,
            'valor' => 12,
        ]);

        DB::table('onibus')->insert([
            'id' => 1,
            'description_id' => 1,
            'description_type' => 'App\OnibusIntermunicipal',
            'disponivel' => true,
            'acessibilidade' => false,
            'custoManutencao' => 193.20,
            'chassi' => 'G2L5CH64Rjh85G5KG',
            'placa' => 'GOV0056',
        ]);

    }
}
