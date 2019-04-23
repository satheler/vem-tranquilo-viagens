<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlocacaoUrbano extends Model
{
    protected $table = 'alocacao_urbano';

    public function onibus()
    {
        return $this->hasOne('App\OnibusUrbano', 'id', 'onibus_id');
    }

    public function trajeto()
    {
        return $this->hasOne('App\TrajetoUrbano', 'id', 'trajeto_id');
    }

    public function motorista()
    {
        return $this->hasOne('App\Funcionario', 'id', 'motorista_id');
    }

    public function cobrador()
    {
        return $this->hasOne('App\Funcionario', 'id', 'cobrador_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'onibus_id' => 'exists:onibus,id',
            'trajeto_id' => 'exists:trajeto_urbano,id',
            'motorita_id' => 'exists:funcionario, id',
            'cobrador_id' => 'exists:funcionario, id',
            'motorista_id' => 'required_if:tipos_funcionario,1',
            'cobrador_id' => 'required_if:tipos_funcionario,2',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->oninus_id = $input['oninus_id'];
        $this->trajeto_id = $input['trajeto_id'];
        $this->motorista_id = $input['motorista_id'];
        $this->cobrador_id = $input['cobrador_id'];

        $this->save();
    }

    public function edit(int $id, array $input)
    {
        $alocacao = $this->find($id);
        $validator = Validator::make($input, [
            'onibus_id' => 'exists:onibus,id',
            'trajeto_id' => 'exists:trajeto_urbano,id',
            'motorita_id' => 'exists:funcionario, id',
            'cobrador_id' => 'exists:funcionario, id',
            'motorista_id' => 'required_if:tipos_funcionario,1',
            'cobrador_id' => 'required_if:tipos_funcionario,2',
        ]);
        if ($validator->fails()) {
            return $validator;
        }
        $alocacao->oninus_id = $input['oninus_id'];
        $alocacao->trajeto_id = $input['trajeto_id'];
        $alocacao->motorista_id = $input['motorista_id'];
        $alocacao->cobrador_id = $input['cobrador_id'];

        $alocacao->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
