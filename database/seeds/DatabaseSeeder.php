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
            CidadesSeeder::class,
            TipoUsuarioSeeder::class,
            UsersTableSeeder::class,
            TiposFuncionarioSeeder::class,
            OnibusSeeder::class,
            CategoriaOnibusSeeder::class,
            TrechosSeeder::class,
            FuncionarioSeeder::class,
            TrajetoUrbanoSeeder::class,
            RodoviariasSeeder::class,
            PassagensIntermunicipalSeeder::class,
            TrajetoIntermunicipalSeeder::class
            // AlocacaoUrbanoSeeder::class
        ]);
    }
}
