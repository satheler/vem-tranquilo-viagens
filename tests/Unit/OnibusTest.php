<?php

namespace Tests\Unit;

use App\OnibusUrbano;
use App\OnibusIntermunicipal;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
            "custoManutencao" => 167.9,
            "chassi" => "juhs85j032jkladlk",
            "placa" => "sqs9126",
       
        ]);

        $this->assertTrue($test === true);
    }
    public function testOnibusUrbanoDois()
    {
        $o = new OnibusUrbano();
        $test = $o->add([
            "lotacao" => 45,
            "arCondicionado" => true,
            "disponivel" => true,
            "acessibilidade" => false,
            "custoManutencao" => 577.9,
            "chassi" => "jugf85j032jkladlk",
            "placa" => "sqs1126",
          
        ]);

        $this->assertTrue($test === true);
    }

    public function testOnibusIntermunicipal()
    {
        $o = new OnibusIntermunicipal();
        $test = $o->add([
          "banheiro"=> true, 
          "disponivel" => true,
          "acessibilidade" => false,
          "custoManutencao" => 587.9,
          "chassi" => "juhs85jfkcjkladlk",
          "placa" => "snh2150",
         
        ]);

        $this->assertTrue($test === true);
    }

    public function testOnibusIntermunicipalDois()
    {
        $o = new OnibusIntermunicipal();
        $test = $o->add([
            "banheiro"=> true, 
            "disponivel" => true,
            "acessibilidade" => false,
            "custoManutencao" => 577.9,
            "chassi" => "juhs85jfh5jkladlk",
            "placa" => "snh9050",
            
        ]);

        $this->assertTrue($test === true);
    }
    

}
   