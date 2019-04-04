<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class Funcionario extends Model
{
    protected $table = 'funcionario';

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'nome' => 'required|string',
            'tipo' => 'exists:tipo,tipo'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->nome = $input['nome'];
        $this->tipo = $input['tipo'];

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $funcionario = $this->find($id);

        $validator = Validator::make($input, [
            'nome' => 'required|string',
            'tipo' => 'exists:tipo,tipo'

        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }
        $funcionario->nome = $input['nome'];
        $funcionario->tipo = $input['tipo'];

        $funcionario->save();
    }
}
