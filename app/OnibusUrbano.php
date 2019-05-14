<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use \Validator as Validator;
use App\RegistroManutencao;

class OnibusUrbano extends Model
{
    protected $table = 'onibus_urbano';

    public function manutencoes(){
        return $this->hasMany('App\RegistroManutencao', 'onibus_id', 'id');
    }

    public function description()
    {
        return $this->morphOne('App\Onibus', 'description');
    }

    public function cidade() {
        return $this->hasOne('App\Cidade', 'id', 'cidade_id');
    }

    public function getAll()
    {
        return $this->whereHas('description', function ($query) {
            $query->where('inativo', false);
        })->get();
    }

    public function getByCidade(int $cidade_id)
    {
        return $this->where('cidade_id', $cidade_id)->get();
    }

    public function get(int $id)
    {
        $onibus = $this->find($id);
        $onibus->description;
        return $onibus;
    }

    public function getFrota(int $id)
    {

        $frota = $this->where('frota_id', $id)->get();

        foreach($frota as $bus => $onibus)
        {
            $bus .= $this->get($onibus->id);
        }

        return $bus;
    }



    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'lotacao' => 'required|integer',
            'arCondicionado' => 'required|boolean',
            'cidade' => 'exists:cidades,id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->lotacao = $input['lotacao'];
        $this->arCondicionado = $input['arCondicionado'];
        $this->cidade_id = $input['cidade'];

        $onibus = new Onibus();
        $onibusAdd = $onibus->add($input);

        if(($onibusAdd instanceof \Illuminate\Validation\Validator)) {
            return $onibusAdd;
        }

        $this->save();
        $this->description()->save($onibusAdd);
    }

    public function edit(int $id)
    {
        $onibus = $this->find($id);
        $description = $onibus->description;
        $description->disponivel = !$description->disponivel;
        $onibus->save();
        $onibus->description()->save($description);
    }

    public function manutencao(array $input, int $id)
    {
        $validator = Validator::make($input, [
            'motivo' => 'required|string',
            'valorOrcamento' => 'required|numeric',
            'oficina' => 'required|string',
            'data' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $validator;
            }

        $onibus = $this->find($id);
        $description = $onibus->description;
        $description->disponivel = false;

        $registro = new RegistroManutencao();
        $registro->motivo = $input['motivo'];
        $registro->oficina = $input['oficina'];
        $registro->orcamento = $input['valorOrcamento'];

        $data_converter = date_create_from_format('Y-m-d', $input['data']);
        $registro->data_entrada = $data_converter;

        $onibus->manutencoes()->save($registro);
        $onibus->description()->save($description);
        $onibus->save();
    }

    public function disable(int $id, array $input)
    {
        $onibus = $this->find($id);
        $validator = Validator::make($input, [
            'observacao'=> 'required|string',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $description = $onibus->description;
        $description->inativo = true;
        $description->observacao = $input['observacao'];

        $onibus->save();
        $onibus->description()->save($description);

        return $this;
    }
}
