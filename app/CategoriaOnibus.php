<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaOnibus extends Model
{
    protected $table = 'categoria_onibus';

    public function getAll()
    {
        return $this->all();
    }
}
