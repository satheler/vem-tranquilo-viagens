<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';

    public function getAll() {
        return $this::all();
    }

    public function add(bool $disponivel, bool $acessibilidade, float $custoManutencao, string $chassi, string $placa) {
        $this->disponivel = $disponivel;
        $this->acessibilidade = $acessibilidade;
        $this->custoManutencao = $custoManutencao;

        if(strlen($chassi) != 17) {
            throw new Exception("Chassi: Quantidade de caracteres inválidos");
        }
        $this->chassi = $chassi;

        if(strlen($placa) != 7) {
            throw new Exception("Placa: Quantidade de caracteres inválidos");
        }
        $this->placa = $placa;

        $this->save();
    }
}
