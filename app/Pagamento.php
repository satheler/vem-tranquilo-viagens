<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = "pagamento";
    public function description()
    {
        return $this->morphTo();
    }


    //add
}
