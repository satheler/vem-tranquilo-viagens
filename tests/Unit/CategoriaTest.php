<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\CategoriaPassageiro;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

        public function testCategoria()
        {
            $o = new CategoriaPassageiro();
            $test = $o->add([
                'tipo' => 'Idoso',
                'desconto' => '15',       
            ]);
    
            $this->assertTrue($test === true);
        }

        public function testCategoriaDois()
        {
            $o = new CategoriaPassageiro();
            $test = $o->add([
                'tipo' => 'Estudante',
                'desconto' => '10',       
            ]);
    
            $this->assertTrue($test === true);
        }
    
    }

