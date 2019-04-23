<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguro';

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $seguro = $this->find($id);
        return $seguro;
    }
}
