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
    public function testTarifaIntermunicipal()
    {
        $o = new Tarifa();
        $test = $o->add([
            'valor' => 2.50,
            'data' =>  '11/04/2019'
                                
        ]);

        $this->assertTrue($test === true);
    }
}
