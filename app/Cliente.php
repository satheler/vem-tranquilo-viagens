<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Validator as Validator;

class Cliente extends Model
{
    public function cartao() {
        return $this->hasOne('App\CartaoCredito', 'id', 'cartao_id');
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'nome' => "required|string|max:255",
            'email' => 'required|string|email|max:255|unique:users',
            'cpf' => 'required|string',
            'senha' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return $validator;
        }


        $this->nome = $input['nome'];
        $this->email = $input['email'];
        $this->cpf = preg_replace('/[^0-9]/', '', $input['cpf']);
        $this->senha = $input['senha'];
        $this->save();

    }

    //add cartão do cliente
}
