<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnibusUrbano extends Model
{

    protected $table = 'onibus_urbano';

    public function description()
    {
        return $this->morphOne('App\Onibus', 'description');
    }
}
