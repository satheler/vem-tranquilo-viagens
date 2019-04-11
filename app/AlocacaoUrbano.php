<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlocacaoUrbano extends Model
{
    protected $table = 'alocacao_urbano';

    public function onibus() {
        return $this->hasOne('App\OnibusUrbano', 'id', 'onibus_id');
    }
    public function trajeto() {
        return $this->hasOne('App\TrajetoUrbano', 'id', 'trajeto_id');
    }
    public function motorista() {
        return $this->hasOne('App\Funcionario', 'id', 'motorista_id');
    }
    public function cobrador() {
        return $this->hasOne('App\Funcionario', 'id', 'cobrador_id');
    }
}
