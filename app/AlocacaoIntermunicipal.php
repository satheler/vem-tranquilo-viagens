<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlocacaoIntermunicipal extends Model
{
    protected $table = 'alocacao_intermunicipal';

    public function onibus() {
        return $this->hasOne('App\OnibusIntermunicipal', 'id', 'onibus_id');
    }
    public function trajeto() {
        return $this->hasOne('App\TrajetoIntermunicipal', 'id', 'trajeto_id');
    }
    public function motorista() {
        return $this->hasOne('App\Funcionario', 'id', 'motorista_id');
    }
    public function auxiliar() {
        return $this->hasOne('App\Funcionario', 'id', 'auxiliar_id');
    }

    public function getAll() {
        return $this->all();
    }
}
