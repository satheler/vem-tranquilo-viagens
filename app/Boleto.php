<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $table= "boleto";

    public function description()
    {
        return $this->morphOne('App\Pagamento', 'description');
    }

    //add
}
