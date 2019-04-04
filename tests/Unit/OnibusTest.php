<?php

namespace Tests\Unit;

use App\OnibusUrbano;;
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
      

   
     //Função de teste de disponibilidade do Onibus - Verifica se o ônibus está cadastrado
    public function testDisponibilidade()
    {
      $o = new OnibusUrbano();
      $test = $o->add([
         "disponibilidade" => true
         ]);
       $this->assertEquals(true, $o->getDisponibilidade());
     
    }
     //Função de teste a acessibilidade do ônibus - Verifica se o ônibus está acessivel 
    public function testAcessibilidade()
    {
      $o = new OnibusUrbano();
      $test = $o->add([
         "acessibilidade"=> false
      ]);
       $this->assertEquals(true, $o->getAcessibilidade()());
      
    }
     //Função de teste o custo da manutenção do ônibus 
    public function testCustoManutencao()
    {
      $o = new OnibusUrbano();
      $test = $o->add([
         "custoManutencao"=> 199.99
      ]);
       $this->assertEquals(1219, $o->getCustoManutencao());
      
    }
     //Função de teste e validação o número do chassi do ônibus 
    public function testChassi()
    {
      $o = new OnibusUrbano();
      $test = $o->add([
         "chassi" => "17bhklsdbaabsdaDD"
      ]);
       $this->assertEquals("aaaaaaaaaaaaaaaaa", $Onibustdd->getChassi());
    
    }
     //Função de teste e validação da placa do ônibus 
    public function testPlaca()
    {
      $o = new OnibusUrbano();
      $test = $o->add([
            "placa" => "HGG5547"
      ]);
       $this->assertEquals("aaaaaaa", $o->getPlaca());
      
      
    }
    //Função de teste de tipo - Compara tipo da variável é o mesmo tipo da comparada
    public function testType()
    {
      $o = new OnibusUrbano();
        $test = $o->add([
         "chassi" => "17bhklsdbaabsdaDD"
      ]);
        $this->assertInternalType('int', $o->getDisponibilidade());
      
    }
   //  public function testedetamanhodecaractere()
   //  {
   //      $o = new OnibusUrbano();
   //      $test = $o->add([
   //          "lotacao" => 1,
   //          "arCondicionado" => true,
   //          "disponivel" => true,
   //          "acessibilidade" => true,
   //          "custoManutencao" => 1.00,
   //          "chassi" => "17bhklsdbaabsdaDD",
   //          "placa" => "HGG5547",
   //      ]);

   //      $this->assertTrue($test === true);
   //  }
    

}
   