<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table= "cartao";

    public function description()
    {
        return $this->morphOne('App\Pagamento', 'description');
    }

    public function cartao() {
        return $this->hasOne('App\CartaoCredito', 'id', 'cartao_id');
    }

    //add
}
