<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Funcionario;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FuncionarioTest extends TestCase
{
    public function testFuncionario()
        {
            $o = new Funcionario();
            $test = $o->add([
                'nome' => 'Judson Henrique',
                'tipo' => 1
            ]);
    
            $this->assertTrue($test === true);
        }
    public function testFuncionarioDois()
        {
            $o = new Funcionario();
            $test = $o->add([
                'nome' => 'Gustavo Gay',
                'tipo' => 2
            ]);
    
            $this->assertTrue($test === true);
        }
}
