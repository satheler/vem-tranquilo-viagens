<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Pagamento extends Model
{
    protected $table = "pagamento_cartao";

    //protected $hidden = ['num_cartao'];

    public function add(array $input)
    {

        $validator = Validator::make($input, [
            'valor' => 'required|numeric|min:0.01',
            'qnt_parcelas' => 'required|numeric|max:6',
            'num_cartao' => 'required|numeric',

        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->valor = $input['valor'] / $input['qnt_parcelas'];
        $this->data = now()->format('Y-m-d');
        $this->qnt_parcelas = $input['qnt_parcelas'];

        $num = str_split($input['num_cartao']);
        $this->num_cartao = $num[12] . $num[13] . $num[14] . $num[15];

        $this->save();

        return $this;
    }

    public function mostrarPontos(int $id)
    {
        $cliente = $cliente->get($id);
        return $cliente->pontos;
    }

    public function usarPontos( array $input)
    {
        $cliente = new Cliente();
        $cliente = $cliente->get($input['cliente_id']);

        if ($input['valor'] >= $cliente->pontos) {
            $valor = $input['valor'] - $cliente->pontos;
            $cliente->pontos = 0;

        }else{
            $pontosRestantes = $cliente->pontos -  $input['valor'] ;
            $cliente->pontos = $pontosRestantes;
            $valor = 0;
        }

        $cliente->update();

        return $valor;

    }
}
