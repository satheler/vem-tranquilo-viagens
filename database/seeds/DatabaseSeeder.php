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
            RodoviariasSeeder::class,
            TipoUsuarioSeeder::class,
            UsersTableSeeder::class,
            TiposFuncionarioSeeder::class,
            CategoriaOnibusSeeder::class,
            OnibusIntermunicipalSeeder::class,
            OnibusUrbanoSeeder::class,
            TrechosSeeder::class,
            FuncionarioSeeder::class,
            TrajetoUrbanoSeeder::class,
            TrajetoIntermunicipalSeeder::class,
            PassagensIntermunicipalSeeder::class,
            // AlocacaoUrbanoSeeder::class
        ]);
    }
}
