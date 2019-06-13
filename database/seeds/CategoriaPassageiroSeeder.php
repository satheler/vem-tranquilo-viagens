<?php

use Illuminate\Database\Seeder;

class CategoriaPassageiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('categoria_passageiro')->insert([
            'id' => 1,
            'tipo' => 'Comum',
            'desconto' => 00,
            'descricao' => ''

        ]);

        DB::table('categoria_passageiro')->insert([
            'id' => 2,
            'tipo' => 'Estudante',
            'desconto' => 10,
            'descricao' => 'É obrigatório a apresentação dos documentos comprovatórios no momento de embarque, sujeito a não autorização do embarque por falta de comprovação, além de penalidades legais por crime previsto no art. 299 do Código Penal. Itens: 3.3, 4.9, 4.10 e 4.11 do Contrato de Transporte Intermunicipal. Acompanhantes deverão adquirir sua passagem em uma de nossas bilheterias mediante comprovação do registro junto aos órgãos competentes.'

        ]);

        DB::table('categoria_passageiro')->insert([
            'id' => 3,
            'tipo' => 'idoso',
            'desconto' => 30,
            'descricao' => 'É obrigatório a apresentação dos documentos comprovatórios no momento de embarque, sujeito a não autorização do embarque por falta de comprovação, além de penalidades legais por crime previsto no art. 299 do Código Penal. Itens: 3.3, 4.9, 4.10 e 4.11 do Contrato de Transporte Intermunicipal. Acompanhantes deverão adquirir sua passagem em uma de nossas bilheterias mediante comprovação do registro junto aos órgãos competentes'

        ]);

        DB::table('categoria_passageiro')->insert([
            'id' => 4,
            'tipo' => 'Especial',
            'desconto' => 100,
            'descricao' => ''
        ]);


    }
}
