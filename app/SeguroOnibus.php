<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguroOnibus extends Model
{
    protected $table = 'seguro_onibus';

    public function onibus() {
        return $this->hasMany('App\Onibus', 'id', 'onibus_id');
    }

    public function seguro()
    {
        return $this->hasMany('App\Seguro', 'id', 'seguro_id');
    }

    public function getAll()
    {
        return $this->all();
    }
}
