<?php

use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_usuario')->insert([
            'id' => 1,
            'tipo' => 'Administrador Geral',
        ]);

        DB::table('tipos_usuario')->insert([
            'id' => 2,
            'tipo' => 'Administrador Local',
        ]);

        DB::table('tipos_usuario')->insert([
            'id' => 3,
            'tipo' => 'Secretário',
        ]);

        DB::table('tipos_usuario')->insert([
            'id' => 4,
            'tipo' => 'Recursos Humanos',
        ]);
      
        DB::table('tipos_usuario')->insert([
            'id' => 5,
            'tipo' => 'Vendedor',
        ]);

        DB::table('tipos_usuario')->insert([
            'id' => 6,
            'tipo' => 'Contador',
        ]);
    }
}
