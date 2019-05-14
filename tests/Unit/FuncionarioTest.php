<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FuncionarioTest extends TestCase
{
    public function testRequiredInstance(){
        $o = new Seguro();
        $test = $o->add([]);
        $this->assertInstanceOf(\Illuminate\Validation\Validator::class,$test);
    }
    public function testAddFuncionario()
    {
        $o = new Funcionario();
        $test = $o->add([
            'nome' => 'Michael Martins',
            'tipo_id' => 1,
            'local_id' => 1,
            'status' => 1,
            'observacao' => 'Nenhuma',
        ]);

        $esperado = $o->get(1);

        $this->assertThat(
          $esperado,
          $this->logicalNot(
            $this->equalTo($test)
          )
        );
    }

    public function testEditFuncionario()
    {
        $o = new Funcionario();
        $test = $o->edit(1, [
            'nome' => 'Michael Martins',
            'tipo_id' => 1,
            'local_id' => 1,
            'status' => 0,
            'observacao' => 'Demitido',
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
