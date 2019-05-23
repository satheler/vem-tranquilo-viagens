<?php

namespace Tests\Unit;

use App\VendaOnline;
use App\OnibusIntermunicipal;
use Tests\TestCase;
use Artisan;

class VendaOnlineTest extends TestCase {

    private $objDefault = [
        'id' => 1,
        'trajeto' => 1,
        'onibus' => 1,
        'motorista_id' => 1,
        'auxiliar_id' => 1
    ];

    private $onibusDefault = [
    "id" => 1,
    "banheiro"=> true,
    "acessibilidade" => false,
    "chassi" => "juhs85jfkcjkladl3",
    "placa" => "snh2151",
    "modelo"=> 'fusca',
    "marca"=> 'fiat',
    "data_compra"=> '10/04/2019',
    "data_fabricacao"=> '09/10/2019',
    "qnt_assentos"=>10];

    protected function setUp(): void  {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
    }

    private function addObj($input = null) {
        $venda = new VendaOnline();
        return $venda->add(isset($input) ? $input : $this->objDefault);
    }

    /**
     * @test
     */
    public function testVender() {
        $result = $this->addObj();
        $this->assertTrue($result);
    }


    public function testMostrarAssentos() {
        $onibus = new OnibusIntermunicipal();
        $onibus->add($this->onibusDefault);
        $result = $onibus->getAssentos();
        $this->assertTrue($result);
    }

}
