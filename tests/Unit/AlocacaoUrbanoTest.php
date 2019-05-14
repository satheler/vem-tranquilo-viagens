<?php

namespace Tests\Unit;

use App\AlocacaoUrbano;
use Tests\TestCase;
use Artisan;

class AlocacaoUrbanoTest extends TestCase {

    private $objDefault = [
        'id' => 1,
        'trajeto' => 1,
        'onibus' => 1,
        'motorista_id' => 1,
        'cobrador_id' => 2,
        'auxiliar_id' => null,
        'horarioInicio' => '05:30',
        'horarioFim' => '12:30',
        'data' => '15/05/2019',
    ];

    protected function setUp(): void  {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
    }

    private function addObj($input = null) {
        $alocacao = new AlocacaoUrbano();
        return $alocacao->add(isset($input) ? $input : $this->objDefault);
    }

    /**
     * @test
     */
    public function allocate() {
        $result = $this->addObj();
        $this->assertTrue($result);
    }

    public function testAllocateDuplicate() {
        $this->addObj();
        $result = $this->addObj();

        $this->assertInstanceOf(\Illuminate\Validation\Validator::class, $result);
    }

    public function testAllocateWithAuxiliar() {
        $alocacao = new AlocacaoUrbano();
        $result = $alocacao->add([
            'trajeto' => 1,
            'onibus' => 1,
            'motorista_id' => 1,
            'cobrador_id' => 2,
            'auxiliar_id' => 3,
            'horarioInicio' => '05:30',
            'horarioFim' => '10:30',
            'data' => '16/05/2019',
        ]);

        $this->assertTrue($result);
    }

    public function testAllocateWithPreviousDate() {
        $alocacao = new AlocacaoUrbano();
        $result = $alocacao->add([
            'trajeto' => 1,
            'onibus' => 1,
            'motorista_id' => 1,
            'cobrador_id' => 2,
            'auxiliar_id' => 3,
            'horarioInicio' => '05:30',
            'horarioFim' => '11:30',
            'data' => '10/05/2019',
        ]);

        $this->assertInstanceOf(\Illuminate\Validation\Validator::class, $result);
    }

    public function testRequiredFields() {
        $result = $this->addObj([]);
        $this->assertInstanceOf(\Illuminate\Validation\Validator::class, $result);
    }

    public function testEditAllocate() {
        $this->addObj();
        $alocacao = new AlocacaoUrbano();
        $id = 1;

        $result = $alocacao->edit($id, [
            'trajeto' => 1,
            'onibus' => 1,
            'motorista_id' => 1,
            'cobrador_id' => 2,
            'auxiliar_id' => null,
            'horarioInicio' => '05:30',
            'horarioFim' => '11:30',
            'data' => '15/05/2019',
        ]);

        $this->assertTrue($result);
    }

    public function testInactiveAllocate() {
        $this->addObj();
        $alocacao = new AlocacaoUrbano();
        $id = 1;

        $result = $alocacao->inactivate($id);

        $this->assertTrue($result);
    }

    public function testInactiveNonexistentId() {
        $this->expectException(\ErrorException::class);

        $alocacao = new AlocacaoUrbano();
        $id = -1;

        $alocacao->inactivate($id);
    }

}
