<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            "nome" => "João Silva",
            "cpf" => "00000000000",
            "senha" => Hash::make('123456'),
            "email" => "joao.silva@mail.com",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

    }
}
