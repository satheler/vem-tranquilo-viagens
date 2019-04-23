<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frota extends Model
{
    protected $table = 'frota';

    public function onibus()
    {
        return $this->hasMany('App\Seguro', 'id', 'seguro_id');
    }
    public function getAll()
    {
        return $this->all();
    }
}
