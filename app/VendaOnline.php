<?php

namespace App;

use App\AlocacaoIntermunicipal;
use App\Pagamento;
use Illuminate\Database\Eloquent\Model;
use Validator;

class VendaOnline extends Model
{
    protected $table = "venda_online";

    public function alocacaoIntermunicipal()
    {
        return $this->hasOne('App\AlocacaoIntermunicipal', 'id', 'alocacao_id');
    }

    public function pagamento()
    {
        return $this->hasOne('App\Pagamento', 'id', 'pagamento_id');
    }

    public function assento()
    {
        return $this->belongsToMany('App\Assento', 'assento_vendido', 'venda_id', 'assento_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {

        $validator = Validator::make($input, [
            'alocacao_intermunicipal_id' => 'exists:alocacao_intermunicipal,id',
            'categoria_passageiro_id' => 'exists:categoria_passageiro,id',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->alocacao_intermunicipal_id = $input['alocacao_intermunicipal_id'];

        $assento = new Assento();
        $assentos = [];

        $lista = [];
        array_push($lista, $input['assentos']);

        foreach ($lista as $itemAssento) {
            array_push($assentos, $assento->add($itemAssento));
        }

        $this->categoria_passageiro_id = $input['categoria_passageiro_id'];

        $pagamento = new Pagamento();

        if ($input['usarPontos'] == true) {

            $valor = $pagamento->usarPontos($input);
            $input['valor'] = $valor;
            $pagamento->add($input);

        } else {

            $pagamento->add($input);

        }

        $this->pagamento_id = $pagamento->id;

        $this->save();
        $this->assento()->attach($assentos);

        return $this;

    }
}
