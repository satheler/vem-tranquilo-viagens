<?php

namespace Tests\Unit;

use App\OnibusUrbano;
use App\OnibusIntermunicipal;
use App\Cidade;
use App\Assento;
use App\AssentoOnibus;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DateTime;

class OnibusTest extends TestCase    
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testOnibusUrbano()
    {
        $o = new OnibusUrbano();
        $test = $o->add([
            "lotacao" => 35,
            "arCondicionado" => true,
            "disponivel" => false,
            "acessibilidade" => false,
            "chassi" => "uhs85j032jkladlka",
            "placa" => "sqk9126",
            "modelo"=> 'fusca',
            "marca"=> 'fiat',
            "data_compra"=> '10/04/2019',
            "data_fabricacao"=> '10/04/2019',
        ]);

        $this->assertTrue($test === true);
    }
    public function testOnibusUrbanoDois()
    {
        $o = new OnibusUrbano();
        $test = $o->add([
            "lotacao" => 45,
            "arCondicionado" => true,
            "acessibilidade" => false,
            "chassi" => "jugf85j032jkladlk",
            "placa" => "sqs1126",
            "modelo"=> 'fusca',
            "marca" => 'fiat',
            "data_compra"=> '10/04/2019',
            "data_fabricacao"=> '09/04/2019'
          
        ]);

        $this->assertTrue($test === true);
    }

    public function testOnibusIntermunicipal()
    {
        $o = new OnibusIntermunicipal();
        $test = $o->add([
          "banheiro"=> true, 
          "acessibilidade" => false,
          "chassi" => "juhs85jfkcjkladl3",
          "placa" => "snh2151",
          "modelo"=> 'fusca',
          "marca"=> 'fiat',
          "data_compra"=> '10/04/2019',
          "data_fabricacao"=> '09/10/2019'
         
        ]);

        $this->assertTrue($test === true);
    }

    public function testOnibusIntermunicipalDois()
    {
        $o = new OnibusIntermunicipal();
        $test = $o->add([
            "banheiro"=> true, 
            "acessibilidade" => false,
            "chassi" => "juhs85jfh5jkladl2",
            "placa" => "snh9050",
            
        ]);

        $this->assertTrue($test === true);
    }
    

}
   