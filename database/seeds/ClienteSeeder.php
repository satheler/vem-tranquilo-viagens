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
        DB::table('users')->insert([
            'id' => 50,
            'name' => 'João Silva',
            'email' => 'joao.silva@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'type' => 'cliente',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clientes')->insert([
            "cpf" => "00000000000",
            "user_id" => 50,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

    }
}
