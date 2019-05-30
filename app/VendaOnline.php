<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaOnline extends Model
{
    protected $table = "venda_online";

    public function tarifa() {
        return $this->hasOne('App\Tarifa', 'id', 'tarifa_id');

    }
    public function alocacaoIntermunicipal() {
        return $this->hasOne('App\AlocacaoIntermunicipal', 'id', 'alocacao_id');
    }
    public function assento() {
        return $this->hasOne('App\Assento', 'id', 'assento_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {

        $validator = Validator::make($input, [
            'alocacao_id' => 'exists:alocacao_intermuncipal,id',
            'tarifa_intermunicipal_id' => 'exists:tarifa_intermuncipal,id',
            'categoria_passageiro_id' => 'exists:categoria_passageiro,id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $assento = new Assento();
        $assento->add($input);

        $this->data_compra = now()->format('Y-m-d');
        $this->alocacao_id = $input['alocacao_id'];
        $this->assento_id = $input['assento_id'];
        $this->tarifa_intermunicipal_id = $input['tarifa_intermunicipal_id'];
        $this->categoria_passageiro_id = $input['categoria_passageiro_id'];

        //verificar  se o cliente existe, se não cliente add
        //pagamento add

        $this->save();

    }
}
