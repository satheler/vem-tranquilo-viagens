<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssentoOnibus extends Model
{
    protected $table = 'assento_onibus';

    public function assento()
    {
        return $this->hasMany('App\Assento',  'id', 'assento_id');
    }

    public function getAll()
    {
        return $this->all();
    }
}
