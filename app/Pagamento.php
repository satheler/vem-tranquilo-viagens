<?php

namespace App;

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
            'qnt_parcelas' =>  'required|numeric|max:6',
            'num_cartao' => 'required|numeric'

        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->valor = $input['valor']/$input['qnt_parcelas'];
        $this->data = now()->format('Y-m-d');
        $this->qnt_parcelas = $input['qnt_parcelas'];

        $num = str_split($input['num_cartao']);
        $this->num_cartao = $num[0].$num[1].$num[2].$num[3];

        $this->save();

        return $this;
    }
}
