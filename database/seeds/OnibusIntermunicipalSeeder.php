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
            'qnt_assento' => 50,
            'banheiro' => false,
            'categoria_onibus_id' => 3,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 2,
            'qnt_assento' => 50,
            'banheiro' => true,
            'categoria_onibus_id' => 3,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 3,
            'qnt_assento' => 50,
            'banheiro' => true,
            'categoria_onibus_id' => 3,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 4,
            'qnt_assento' => 40,
            'banheiro' => false,
            'categoria_onibus_id' => 1,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 5,
            'qnt_assento' => 40,
            'banheiro' => false,
            'categoria_onibus_id' => 1,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 6,
            'qnt_assento' => 46,
            'banheiro' => true,
            'categoria_onibus_id' => 2,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 7,
            'qnt_assento' => 45,
            'banheiro' => true,
            'categoria_onibus_id' => 2,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 8,
            'qnt_assento' => 50,
            'banheiro' => true,
            'categoria_onibus_id' => 3,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 9,
            'qnt_assento' => 50,
            'banheiro' => true,
            'categoria_onibus_id' => 3,
        ]);

        DB::table('onibus_intermunicipal')->insert([
            'id' => 10,
            'qnt_assento' => 50,
            'banheiro' => true,
            'categoria_onibus_id' => 3,
        ]);

        DB::table('onibus')->insert([
            'description_id' => 1,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'G2L5CH64R7K85G5KA',
            'placa' => 'VOG5600',
            'marca' => 'Mercedes Benz',
            'modelo' => 'KL 3201',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 2,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'O9L5C8U4R7K85G5KA',
            'placa' => 'TAD5806',
            'marca' => 'Mercedes Benz',
            'modelo' => 'KY 8475',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 3,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'P9L5CH64R7K85G5RT',
            'placa' => 'OJE8232',
            'marca' => 'Volkswagen/MAN',
            'modelo' => 'SPRINTER',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 4,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'M9L5CH64R7K85G5WE',
            'placa' => 'UIS2424',
            'marca' => 'Marcopolo',
            'modelo' => 'VOLARE V8 ON',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 5,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'Z3Z5CH64R7K85G5LN',
            'placa' => 'YOU0909',
            'marca' => 'Iveco',
            'modelo' => 'PUYOLU 2300',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 6,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'SAL5CH64R7K85G5KA',
            'placa' => 'SAL8748',
            'marca' => 'Volvo',
            'modelo' => 'VOVOZIM 97',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 7,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'U0L5CH64M7K85L5YT',
            'placa' => 'YES6969',
            'marca' => 'International',
            'modelo' => 'INT 54ML',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 8,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'K7L5CH64R7K85G57K',
            'placa' => 'KKK5467',
            'marca' => 'Scania',
            'modelo' => 'T5882',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 9,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'U7L5CH64R7K85G5YC',
            'placa' => 'QWE2145',
            'marca' => 'Mercedes Benz',
            'modelo' => 'KT 2000',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

        DB::table('onibus')->insert([
            'description_id' => 10,
            'description_type' => 'App\OnibusIntermunicipal',
            'acessibilidade' => false,
            'chassi' => 'Y7L5CH64R7K85G5M8',
            'placa' => 'BOI8989',
            'marca' => 'Mercedes Benz',
            'modelo' => 'MH99',
            'data_fabricacao' => now(),
            'data_compra' => now(),
        ]);

    }
}
