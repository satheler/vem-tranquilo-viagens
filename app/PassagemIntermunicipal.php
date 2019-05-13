<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassagemIntermunicipal extends Model
{
    protected $table = 'passagens_intermunicipal';


    public function getAll() {
        return $this->all();
    }

    public function get(int $id) {
        return $this->find($id);
    }



}
