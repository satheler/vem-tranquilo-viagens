<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\CategoriaPassageiro;
use App\PassagemUrbana;
use App\TarifaUrbano;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContadorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

        public function testCalcularDesconto()
        {
            $o = new CategoriaPassageiro();
            $test = $o->get(1);

            $tarifa = new TarifaUrbano();
            $tarif = $tarifa->get(1);

           $valorEsperado = 1.4;

            $this->assertEquals($valorEsperado,$test->calcularValorPassagem($tarif, $test));
        }

    }

