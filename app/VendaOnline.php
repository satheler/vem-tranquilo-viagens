<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaOnline extends Model
{
    protected $table = "venda_online";

    public function tarifa() {
        return $this->hasOne('App\Tarifa', 'id', 'tarifa_id');

    }
    public function alocacaoIntermunicipal() {
        return $this->hasOne('App\AlocacaoIntermunicipal', 'id', 'alocacao_id');
    }
    public function assento() {
        return $this->hasOne('App\Assento', 'id', 'assento_id');
    }

//add
}
