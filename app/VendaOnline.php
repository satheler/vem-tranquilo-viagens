<?php

namespace App;

use App\AlocacaoIntermunicipal;
use App\Pagamento;
use Illuminate\Database\Eloquent\Model;
use Validator;

class VendaOnline extends Model
{
    protected $table = "venda_online";

    public function alocacaoIntermunicipal() {
        return $this->hasOne('App\AlocacaoIntermunicipal', 'id', 'alocacao_intermunicipal_id');
    }

    public function pagamento()
    {
        return $this->hasOne('App\Pagamento', 'id', 'pagamento_id');
    }

    public function assento()
    {
        return $this->belongsToMany('App\Assento', 'assentos_vendidos', 'venda_id', 'id');
    }

    public function getByAlocacao($id) {
        return $this->where('alocacao_intermunicipal_id', $id)->first();
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {

        $validator = Validator::make($input, [
            'alocacao_intermunicipal_id' => 'exists:alocacao_intermunicipal,id',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->alocacao_intermunicipal_id = $input['alocacao_intermunicipal_id'];

        foreach ($input['poltronas'] as $poltrona) {
            $assento = new Assento();
            $assento->add(['num_assento' => $poltrona, 'alocacao_id' => $input['alocacao_intermunicipal_id']]);
        }

        $pagamento = new Pagamento();

        if ($input['usarPontos'] == 'on') {
            $valor = $pagamento->usarPontos($input);
            $input['valor'] = $valor;
        }

        $pagamento = $pagamento->add($input);

        $this->pagamento_id = $pagamento;

        $this->save();
        $assento->addVenda($this->id);

        return $this;

    }
}
