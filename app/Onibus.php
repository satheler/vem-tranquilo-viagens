<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';

    public function inherit() {
        return $this->morphTo();
    }


}
