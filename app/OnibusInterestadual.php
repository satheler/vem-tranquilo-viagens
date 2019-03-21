<?php

namespace App;

use App\Onibus;
use Illuminate\Database\Eloquent\Model;

class OnibusInterestadual extends Onibus
{
    protected $table = 'onibus_interestadual';

    public function __construct() {
        parent::__construct(); // É o super do java para herança
    }
}
