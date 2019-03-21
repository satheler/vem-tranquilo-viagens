<?php

namespace App;

use App\Onibus;
use Illuminate\Database\Eloquent\Model;

class OnibusUrbano extends Onibus
{

    protected $table = 'onibus_urbano';

    public function __construct() {
        parent::__construct(); // É o super do java para herança
    }

    public function onibus(){
        return $this->morphOne(Onibus::class, 'inherit');
    }

}
