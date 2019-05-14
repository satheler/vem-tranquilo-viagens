<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Usuário: Administrador geral
         */
        DB::table('users')->insert([
            'name' => 'Administrador Geral',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'tipo_usuario_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /**
         * Usuário: Gerente local
         */
        DB::table('users')->insert([
            'name' => 'Gerente Local',
            'email' => 'local@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'cidade_id' => 1,
            'tipo_usuario_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /**
         * Usuário: Secretário
         */
        DB::table('users')->insert([
            'name' => 'Secretário',
            'email' => 'secretario@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'tipo_usuario_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /**
         * Usuário: Recursos Humanos
         */
        DB::table('users')->insert([
            'name' => 'Recursos Humanos',
            'email' => 'rh@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'tipo_usuario_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
