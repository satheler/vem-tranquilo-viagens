<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Auth;

class Pagamento extends Model
{
    protected $table = "pagamento_cartao";

    //protected $hidden = ['num_cartao'];



    public function add(array $input)
    {


        $validator = Validator::make($input, [
            'valor' => 'required|numeric|min:0.01',
            'parcelas' => 'required|numeric|max:6',
            'nro' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $validator;
            }

            $this->valor = $input['valor'] / $input['parcelas'];
            $this->data = now();
            $this->qnt_parcelas = $input['parcelas'];

            $num = str_split($input['nro']);
            $this->num_cartao = $num[12].$num[13].$num[14].$num[15];

            $this->save();

            return $this->id;
    }

    public function mostrarPontos(int $id)
    {
        $cliente = $cliente->get($id);
        return $cliente->pontos;
    }

    public function usarPontos( array $input)
    {
        $cliente = new Cliente();
        $cliente = $cliente->where(['user_id' => Auth::user()->id])->first();

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
