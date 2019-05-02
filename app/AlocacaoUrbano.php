<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

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
            'trajeto' => 'required|exists:trajeto_urbano,id',
            'data' => 'required|date_format:d/m/Y|after:'. now()->format('d/m/Y'),
            'horarioInicio' => 'required|date_format:H:i',
            'horarioFim' => 'required|date_format:H:i',
            'onibus' => 'required|exists:onibus,id',
            'motorista' => 'required|exists:funcionarios,id',
            'cobrador' => 'required|exists:funcionarios,id',
            'auxiliar' => 'exists:funcionarios,id',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->trajeto_id = $input['trajeto'];
        $this->onibus_id = $input['onibus'];
        $this->motorista_id = $input['motorista'];
        $this->cobrador_id = $input['cobrador'];
        $this->auxiliar_id = isset($input['auxiliar']) ? $input['auxiliar'] : null;

        $this->horarioInicio = $input['horarioInicio'];
        $this->horarioFim = $input['horarioFim'];

        $dataConverter = date_create_from_format('d/m/Y', $input['data']);
        $this->data = $dataConverter->format('Y-m-d');

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
