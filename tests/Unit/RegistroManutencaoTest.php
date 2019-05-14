<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\RegistroManutencao;
use App\Onibus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistroManutencaoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRegistroManutencao()
    {
        $r = new RegistroManutencao();
        $test = $r->add([
            "motivo" => 'Bateu',
            "oficina" => 'Tio Chico',
            "orcamento" => 150,
            "data_entrada" => '2019-04-12',
            "data_saida" => '2019-05-12',
            "valor_final" => 155,
            "observacao"=> 'Nenhuma',
            "onibus_id"=> 1,
        ]);

        $esperado = $r->get(1);
        $this->assertThat(
          $esperado,
          $this->logicalNot(
            $this->equalTo($test)
          )
        );
    }
    
    public function testRequiredInstance(){
        $r = new RegistroManutencao();
        $test = $r->add([]);
        $this->assertInstanceOf(\Illuminate\Validation\Validator::class,$test);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
