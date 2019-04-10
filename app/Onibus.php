<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class Onibus extends Model
{
    protected $table = 'onibus';

    public function description()
    {
        return $this->morphTo();
    }

    protected function getAll()
    {
        return $this::all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'disponivel' => 'required|boolean',
            'acessibilidade' => 'required|boolean',
            'custoManutencao' => 'required|numeric',
            'chassi' => 'required|min:17|max:17|unique:onibus',
            'placa' => 'required|min:7|max:7|unique:onibus',

            'modelo' => 'required|string',
            'marca' => 'required|marca',
            'data_compra' => 'before_or_equal:date',
            'data_fabricacao' => 'before_or_equal:date'

        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->disponivel = $input['disponivel'];
        $this->acessibilidade = $input['acessibilidade'];
        $this->custoManutencao = $input['custoManutencao'];
        $this->chassi = $input['chassi'];
        $this->placa = $input['placa'];
        $this->modelo = $input['modelo'];
        $this->marca = $input['marca'];
        $this->data_fabricacao = $input['data_fabricacao'];
        $this->data_compra = $input['data_compra'];

        return $this;
    }
}
