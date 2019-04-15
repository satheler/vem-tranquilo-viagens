<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\FormaDePagamento;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormaPagamentoTeste extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

        public function testFormaPagamento()
        {
            $o = new FormaDePagamento();
            $test = $o->add([
                'forma' => 'Cartão de crédito',
                'intermunicipal' => false,       
            ]);
    
            $this->assertTrue($test === true);
        }
        public function testFormaPagamentoDois()
        {
            $o = new FormaDePagamento();
            $test = $o->add([
                'forma' => 'Boleto bancário',
                'intermunicipal' => true       
            ]);
    
            $this->assertTrue($test === true);
        }
    }

