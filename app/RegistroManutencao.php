<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Validator;

class RegistroManutencao extends Model
{
    protected $table = 'registro_manutencao';

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $registro = $this->find($id);
        return $registro;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'motivo' => 'required|string',
            'valor' => 'required|numeric|min:0.01'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->motivo = $input['motivo'];
        $this->valor = $input['valor'];

        $this->save();
    }

    public function edit(int $id, array $input)
    {
        $registro = $this->find($id);

        $validator = Validator::make($input, [
            'motivo' => 'required|string',
            'valor' => 'required|numeric|min:0.01'

        ]);
        if ($validator->fails()) {
            return $validator;
        }
        $this->motivo = $input['motivo'];
        $this->valor = $input['valor'];

        $funcionario->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
