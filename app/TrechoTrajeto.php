<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrechoTrajeto extends Model
{
    protected $table = 'trajeto_trecho';

    public function trecho()
    {
        return $this->hasMany('App\Trecho',  'id', 'trecho_id');
    }

    public function getAll()
    {
        return $this->all();
    }
}
