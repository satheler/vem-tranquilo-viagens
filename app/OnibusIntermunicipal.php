<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnibusIntermunicipal extends Model
{
    protected $table = 'onibus_intermunicipal';

    public function description()
    {
        return $this->morphOne('App\Onibus', 'description');
    }
}
