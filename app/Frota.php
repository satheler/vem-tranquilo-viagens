<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frota extends Model
{
    public function onibus()
    {
        return $this->hasMany('App\Onibus', 'id', 'onibus_id');
    }
}
