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
            FormaDePagamentoSeeder::class,
            RodoviariasSeeder::class,
            TipoUsuarioSeeder::class,
            UsersTableSeeder::class,
            TiposFuncionarioSeeder::class,
            CategoriaOnibusSeeder::class,
            OnibusIntermunicipalSeeder::class,
            OnibusUrbanoSeeder::class,
            FuncionarioSeeder::class,
            TrajetoUrbanoSeeder::class,
            TrajetoIntermunicipalSeeder::class,
            AlocacaoUrbanoSeeder::class,
            AlocacaoIntermunicipalSeeder::class,
            PagamentoCartaoSeeder::class,
            AssentoSeeder::class,
            CategoriaPassageiroSeeder::class,
            ClienteSeeder::class,
            TarifaIntermunicipalSeeder::class,
            VendaOnlineSeeder::class,
            PassagensIntermunicipalSeeder::class,
            RegistroSinistroSeeder::class

        ]);
    }
}
