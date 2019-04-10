<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Exception;

class CategoriaPassageiro extends Model
{
    protected $table = 'categoria_passageiro';

    public function getAll()
    {
        return $this::all();
    }

    public function get(int $id){
        $categoria = $this->find($id);
        return $categoria;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'tipo' => 'required|string',
            'desconto' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->tipo = $input['tipo'];
        $this->desconto = $input['desconto'];

        $this->save();
    }

    public function edit(int $id, array $input)
    {
        $passageiro = $this->find($id);
        $validator = Validator::make($input, [
            'tipo' => 'required|string',
            'desconto' => 'required|beetwen:0,100'
        ]);
        if ($validator->fails()) {
            return $validator;
        }
        $passageiro->tipo = $input['tipo'];
        $passageiro->desconto = $input['desconto'];

        $passageiro->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
