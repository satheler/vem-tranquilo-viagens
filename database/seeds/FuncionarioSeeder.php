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
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('funcionarios')->insert([
            "nome" => "Judson Alvarenga",
            "tipo_id" => 2,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('funcionarios')->insert([
            "nome" => "Rodrigo Barbosa",
            "tipo_id" => 3,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
