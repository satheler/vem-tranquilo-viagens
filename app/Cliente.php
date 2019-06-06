<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pagamento;

class Cliente extends Model
{
    protected $table ='cliente';

    public function pagamento() {
        return $this->hasOne('App\Pagamento', 'id', 'cartao_id');
    }

    public function get(int $id){

        return $this->find($id);

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

    public function addPagamento(int $idCliente, int $idPagamento){

        $cliente = $this->find($id);
        $cliente->cartao_id = $idPagamento;
        $cliente->save();

    }

}
