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
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->disponivel = $input['disponivel'];
        $this->acessibilidade = $input['acessibilidade'];
        $this->custoManutencao = $input['custoManutencao'];
        $this->chassi = $input['chassi'];
        $this->placa = $input['placa'];

        return $this;
    }

    public function disable(int $id,array $input)
    {
        $onibus = $this->find(id);
        $validator = Validator::make($input, [
            'observacao'=> 'required|string',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

	    $this->inativo = true;
        $this->observacao = $input['observacao'];

        $onibus->save();

        return $this;
    }
}
