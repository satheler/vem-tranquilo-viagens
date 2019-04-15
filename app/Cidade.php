<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';

    public function getAll()
    {
        return $this->all();
    }
}
