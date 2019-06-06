<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\RegistroSinistro;

class RegistrarSinistroTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRegistroSinistro()
    {
        $sinistro = new RegistroSinistro();
        $test = $sinistro->add([
            "tipo_causa" => 'pneu furou',
            "descricao_causa" => 'pneu furou com o onibus em movimento, e matou todo mundo',
            "envolvidos" => 'motorista e 23 vitímas',
            "custo" => 1112,
            "descricao_custo" => 'capotou o onibus',
            "data" => '21/05/2019',
            "onibus_id"=> 1
            
        ]);

        $this->assertTrue($test === true);
    }

    public function testRegistroSinistroDois()
    {
        $sinistro = new RegistroSinistro();
        $test = $sinistro->add([
            "tipo_causa" => 'pneu furou',
            "descricao_causa" => 'pneu furou com o onibus em movimento, e matou todo mundo',
            "envolvidos" => 'motorista e 23 vitímas',
            "custo" => 1112,
            "descricao_custo" => 'capotou o onibus',
            "data" => '21/05/2019',
            "onibus_id"=> 1
            
        ]);

        $this->assertTrue($test === true);
    }
}
