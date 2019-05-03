<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rodoviaria extends Model
{
    protected $table = 'rodoviarias';

    public function getAll()
    {
        return $this->all();
    }
}
