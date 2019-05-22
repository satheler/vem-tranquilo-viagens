<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function cartao() {
        return $this->hasOne('App\CartaoCredito', 'id', 'cartao_id');
    }

    //add
}
