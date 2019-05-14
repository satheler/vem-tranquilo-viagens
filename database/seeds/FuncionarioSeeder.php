<?php

use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            "nome" => "Michael Martins",
            "tipo_id" => 1,
            "local_id" => 1,
            "status" => 1,
            "observacao" => "Nenhuma",
            "created_at" => now(),
            "updated_at" => now()
            ]);
            
            DB::table('funcionarios')->insert([
                "nome" => "Gustavo Satheler",
                "tipo_id" => 2,
                "local_id" => 1,
                "status" => 0,
                "observacao" => "Férias",
                "created_at" => now(),
                "updated_at" => now()
                ]);
                
                DB::table('funcionarios')->insert([
                    "nome" => "Rodrigo Oliveira",
                    "tipo_id" => 3,
                    "local_id" => 1,
                    "status" => 0,
                    "observacao" => "Demitido",
                    "created_at" => now(),
                    "updated_at" => now()
                    ]);
    }
}
