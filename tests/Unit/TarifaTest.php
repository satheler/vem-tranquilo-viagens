<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Tarifa;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TarifaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTarifaUrbano()
    {
        $o = new Tarifa();
        $test = $o->add([
            'cidade' => 'Alegrete',
            'licitacao' => 'test',
            'valor_especial' => 3.50,
            'valor' => 2.00,
            'data' =>  date('Y-m-d'),
                                
        ]);

        $this->assertTrue($test === true);
    }
}
