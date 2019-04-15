<?php

use Illuminate\Database\Seeder;

class TiposFuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_funcionario')->insert([
            'nome' => "Motorista",
        ]);
        DB::table('tipos_funcionario')->insert([
            'nome' => "Cobrador",
        ]);
        DB::table('tipos_funcionario')->insert([
            'nome' => "Auxiliar",
        ]);
    }
}
