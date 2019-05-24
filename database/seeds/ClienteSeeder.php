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
        DB::table('cliente')->insert([
            'cpf'=>12312312312,
            'senha' => Hash::make('123456'),
            'confirmar_senha' => Hash::make('123456'),
            'email' => 'judson@mail.com',
            'confirmar_email' => 'judson@mail.com',
            'email_verified_at' => now(),
            'telefone' => 988354601,
            'celular' => 2313231231,
            'cep' => 97650345,
            'rua' => 'culimpinho',
            'numero' => 111,
            'bairro' => 'gotancity',
            'complemento' => 'perto da casa do batman',
            'estado' => 'RS'
          
        ]);

        DB::table('cliente')->insert([
            'cpf'=>12312317642,
            'senha' => Hash::make('1234'),
            'confirmar_senha' => Hash::make('1234'),
            'email' => 'judsonjudson@mail.com',
            'confirmar_email' => 'judsonjudson@mail.com',
            'email_verified_at' => now(),
            'telefone' => 988353401,
            'celular' => 2313257831,
            'cep' => 97640345,
            'rua' => 'cusujinho',
            'numero' => 112,
            'bairro' => 'gotancity',
            'complemento' => 'perto da casa do batman',
            'estado' => 'RS'
          
        ]);
    }
}
