<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Rodoviarias;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RodoviariasTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddRodoviaria()
    {
        $o = new Rodoviarias();
        $test = $o->add([
            'logradouro' => "Rua Honório Lemes",
            'numero' => 114,
            'bairro' => "Ibiphp rapuitã",
            'cidade_id' => 1,
            'cep' => 97546260,
            'telefone' => 5533221100 

        ]);

        $this->assertEquals(NULL,$test);

    }

    public function testEditRodoviarias()
    {
        $o = new Rodoviarias();
        $test = $o->edit(1, [
            'logradouro' => "Rua Sergipe",
            'numero' => 574,
            'bairro' => "Santos Dumont",
            'cidade_id' => 1,
            'cep' => 97547380,
            'telefone' => 5500112233

        ]);

        $this->assertEquals(NULL,$test);
    }
}
