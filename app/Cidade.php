<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';

    public function get($id) {
        return $this->find($id);
    }

    public function getAll()
    {
        return $this->all();
    }
}
