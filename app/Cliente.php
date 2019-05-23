<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function cartao() {
        return $this->hasOne('App\CartaoCredito', 'id', 'cartao_id');
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'nome' => 'required|string',
            'cpf' => 'required|numeric|min:11||max:11'
        ]);

        if ($validator->fails()) {
            return $validator;
        }


        $this->nome = $input['nome'];
        $this->cpf = $input['cpf'];
        $this->save();

    }

    //add cartão do cliente
}
