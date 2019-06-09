<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFuncionario extends Model
{
    protected $table = 'tipos_funcionario';

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id)
    {
        $item = $this->find($id);
        return $item;
    }
}
