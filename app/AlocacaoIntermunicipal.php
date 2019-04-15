<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Não faz parte das histórias deste sprint
class AlocacaoIntermunicipal extends Model
{
    protected $table = 'alocacao_intermunicipal';

    public function onibus() {
        return $this->hasOne('App\OnibusIntermunicipal', 'id', 'onibus_id');
    }
    public function trecho() {
        return $this->hasMany('App\Trecho', 'id', 'trecho_id');
    }
    public function motorista() {
        return $this->hasOne('App\Funcionario', 'id', 'motorista_id');
    }
    public function auxiliar() {
        return $this->hasOne('App\Funcionario', 'id', 'auxiliar_id');
    }
}
