<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Seguro;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeguroTest extends TestCase
{
    /**
     * A basic unit test.
     *
     * @return void
     */
    public function testRequiredInstance(){
        $o = new Seguro();
        $test = $o->add([]);
        $this->assertInstanceOf(\Illuminate\Validation\Validator::class,$test);
    }
    public function testAddSeguro()
    {
        $o = new Seguro();
        $test = $o->add([
            'id' => 1,
            'empresa' => 'VemTranquiloSeguros',
            'valor' => 100,
            'assegura' => 'Acidentes na rodovia',
            'data_inicio' => '2019-05-02',
            'data_vigencia' => '2019-05-03',
            'onibus' => [1,2],
            'vigente' => true

        ]);

        $esperado = $o->get(1);

        $this->assertThat(
          $esperado,
          $this->logicalNot(
            $this->equalTo($test)
          )
        );

    }

    public function testEditSeguro()
    {
        $o = new Seguro();
        $test = $o->edit(1, [
            'id' => 1,
            'empresa' => 'VemTranquilinho',
            'valor' => 563,
            'assegura' => 'Acidentes na cidade e rodovia',
            'data_inicio' => '2019-05-02',
            'data_vigencia' => '2020-05-03',
            'onibus' => [2],
            'vigente' => true

        ]);

        $esperado = $o->get(1);

        $this->assertThat(
          $esperado,
          $this->logicalNot(
            $this->equalTo($test)
          )
        );

    }
}
