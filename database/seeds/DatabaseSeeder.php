<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipoUsuarioSeeder::class,
            UsersTableSeeder::class,
            TiposFuncionarioSeeder::class,
            OnibusSeeder::class,
            CidadesSeeder::class,
            CategoriaOnibusSeeder::class,
            AlocacaoUrbanoSeeder::class
        ]);
    }
}
