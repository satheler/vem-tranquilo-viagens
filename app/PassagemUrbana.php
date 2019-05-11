<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassagemUrbana extends Model
{
    protected $table = 'passagem_urbana';

    public function alocacao() {
        return $this->hasOne('App\AlocacaoUrbano', 'id', 'alocacao_urbana_id');
    }

    public function valor() {//Modificar aqui
        return $this->hasOne('App\TarifaUrbano', 'id', 'valor_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $passagem = $this->find($id);
        return $passagem;
    }

    public function contarPassagem(){

    }

    public function calcularLucroMensal(){

    }
}
