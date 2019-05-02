<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Frota extends Model
{
    protected $table = 'frota';

    public function seguro()
    {
        return $this->hasMany('App\Seguro', 'id', 'seguro_id');
    }

    public function get(int $id)
    {
        $item = $this->find($id);
        return $item;
    }

    public function getSeguro(int $id)
    {
        return $this->where('seguro_id', $id)->get();
    }


    public function getAll()
    {
        return $this->all();
    }
}
