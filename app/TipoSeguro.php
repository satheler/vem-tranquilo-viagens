<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSeguro extends Model
{
    protected $table = 'tipo_seguro';

    public function getAll()
    {
        return $this->all();
    }
}
