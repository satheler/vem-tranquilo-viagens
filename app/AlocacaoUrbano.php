<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Exception;

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

    public function auxiliar()
    {
        return $this->hasOne('App\Funcionario', 'id', 'auxiliar_id');
    }

    public function getAll()
    {
        return $this->where('ativo', true)->get();
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function add(array $input)
    {
        $validator = $this->validate($input);
        if ($validator->fails()) {
            return $validator;
        }

        $this->trajeto_id = $input['trajeto'];
        $this->onibus_id = $input['onibus'];
        $this->motorista_id = $input['motorista_id'];
        $this->cobrador_id = $input['cobrador_id'];
        $this->auxiliar_id = isset($input['auxiliar_id']) ? $input['auxiliar_id'] : null;

        $this->horarioInicio = $input['horarioInicio'];
        $this->horarioFim = $input['horarioFim'];

        $dataConverter = date_create_from_format('d/m/Y', $input['data']);
        $this->data = $dataConverter->format('Y-m-d');

        $this->save();
    }

    public function edit(int $id, array $input)
    {
        $validator = $this->validate($input);
        if ($validator->fails()) {
            return $validator;
        }

        $alocacao = $this->find($id);
        $alocacao->trajeto_id = $input['trajeto'];
        $alocacao->onibus_id = $input['onibus'];
        $alocacao->motorista_id = $input['motorista_id'];
        $alocacao->cobrador_id = $input['cobrador_id'];
        $alocacao->auxiliar_id = isset($input['auxiliar_id']) ? $input['auxiliar_id'] : null;

        $alocacao->horarioInicio = $input['horarioInicio'];
        $alocacao->horarioFim = $input['horarioFim'];

        $dataConverter = date_create_from_format('d/m/Y', $input['data']);
        $alocacao->data = $dataConverter->format('Y-m-d');

        $alocacao->update();
    }

    public function inactivate(int $id)
    {
        $alocacao = $this->find($id);
        $alocacao->ativo = false;
        $alocacao->save();
    }

    private function validate(array $input)
    {
        define("INPUT", $input);
        $validator = Validator::make($input, [
            'trajeto' => 'required|exists:trajeto_urbano,id',
            'data' => 'required|date_format:d/m/Y|after:' . now()->format('d/m/Y'),
            'horarioInicio' => 'required|date_format:H:i',
            'horarioFim' => 'required|date_format:H:i',
            'onibus' => [
                'required',
                'exists:onibus,id',
                function ($attribute, $value, $fail) {

                    $result = $this->where('onibus_id', $value)
                                    ->whereBetween('horarioInicio', [INPUT['horarioInicio'], INPUT['horarioFim']])
                                    ->whereBetween('horarioFim', [INPUT['horarioInicio'], INPUT['horarioFim']])
                                    ->whereRaw('? BETWEEN horarioInicio and horarioFim', [INPUT['horarioInicio']])
                                    ->whereRaw('? BETWEEN horarioInicio and horarioFim', [INPUT['horarioFim']])
                                    ->whereDate('data', date_create_from_format('d/m/Y', INPUT['data'])->format("Y-m-d"))
                                    ->where('ativo', true)
                                    ->first();

                    if ($result) {
                        $fail('Este ônibus está em conflito de horário, por favor verifique e tente novamente.');
                    }
                }
            ],
            'motorista_id' => [
                'required',
                'exists:funcionarios,id',
                function ($attribute, $value, $fail) {
                    $this->validateFuncionario($attribute, $value, $fail);
                },
            ],
            'cobrador_id' => [
                'required',
                'exists:funcionarios,id',
                function ($attribute, $value, $fail) {
                    $this->validateFuncionario($attribute, $value, $fail);
                },
            ],
            'auxiliar_id' => [
                'nullable',
                'exists:funcionarios,id',
                function ($attribute, $value, $fail) {
                    $this->validateFuncionario($attribute, $value, $fail);
                },
            ],
        ]);

        return $validator;
    }

    private function validateFuncionario($attribute, $value, $fail)
    {
        $result = $this->where('data', date_create_from_format('d/m/Y', INPUT['data'])->format('Y-m-d'))
            ->where($attribute, $value)
            ->where('ativo', true)
            ->first();

        if ($result) {
            $fail('Funcionário já está alocado neste dia');
        }
    }
}
