<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Validator;

class SeguroFuncionario extends Model
{
    protected $table = 'seguro_funcionario';

    public function funcionario()
    {
        return $this->belongsToMany('App\User', 'seguro_funcionario_relacionamento', 'seguro_id', 'funcionario_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function verificarValidade(array $listafuncionario)
    {

        $funcionario = new User();

        foreach ($listafuncionario as $itemfuncionario) {
            $item = $funcionario->get($itemfuncionario);
            if ($item->seguro) {
                $seguros = $item->seguro;
                foreach ($seguros as $seguro) {
                    if ($seguro->vigente == true) {
                        $validator = 'unique:seguro_funcionario_relacionamento,funcionario_id';
                        return $validator;
                    }
                }
            }
        }
    }

    public function verificarValidadeEdicao(SeguroFuncionario $seguroeditado, array $listafuncionario)
    {

        $funcionario = new User();
        $validator = '';

        foreach ($listafuncionario as $itemfuncionario) {
            $item = $funcionario->get($itemfuncionario);
            if ($item->seguro) {
                $seguros = $item->seguro;
                foreach ($seguros as $seguro) {
                    if ($seguro->id == $seguroeditado->id) {
                        $validator = '';
                    } else {
                        if ($seguro->vigente == true) {
                            $validator = 'unique:seguro_funcionario_relacionamento,funcionario_id';
                            return $validator;
                        }
                    }
                }
            }
            return $validator;
        }
    }

    public function add(array $input)
    {
        if (!array_key_exists('user', $input)) {
            $input['user'] = [];
        }

        $validator = Validator::make($input, [
            'empresa' => 'required|string',
            'valor' => 'required|numeric|min:0.01',
            'assegura' => 'required|string',
            'data_vigencia' => 'required|date_format:d/m/Y|after:' . now()->format('d/m/Y'),
            'data_inicio' => 'required|date_format:d/m/Y|before:data_vigencia',
            'user' => ['required', 'array', $this->verificarValidade($input['user'])],
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->empresa = $input['empresa'];
        $this->valor = $input['valor'];
        $this->assegura = $input['assegura'];

        $dataConverterInicio = date_create_from_format('d/m/Y', $input['data_inicio']);
        $this->data_inicio = now()->format('Y-m-d');

        $dataConverter = date_create_from_format('d/m/Y', $input['data_vigencia']);
        $this->data_vigencia = $dataConverter->format('Y-m-d');

        $this->vigente = true;

        $this->save();
        $this->funcionario()->attach($input['user']);
    }

    public function edit(int $id, array $input)
    {
        $seguro = $this->get($id);

        if (!array_key_exists('user', $input)) {
            $input['user'] = [];
            //$input['funcionario'] = $seguro->funcionario->toArray();
        }

        $validator = Validator::make($input, [
            'empresa' => 'required|string',
            'valor' => 'required|numeric|min:0.01',
            'assegura' => 'required|string',
            'data_vigencia' => 'required|date_format:d/m/Y|after:' . now()->format('d/m/Y'),
            'data_inicio' => 'required|date_format:d/m/Y|before:data_vigencia',
            'user' => [
                'required',
                'array',
                $this->verificarValidadeEdicao($seguro, $input['user']),
            ],
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $seguro->empresa = $input['empresa'];
        $seguro->valor = $input['valor'];
        $seguro->assegura = $input['assegura'];

        $dataConverterInicio = date_create_from_format('d/m/Y', $input['data_inicio']);
        $seguro->data_inicio = $dataConverterInicio->format('Y-m-d');

        $dataConverter = date_create_from_format('d/m/Y', $input['data_vigencia']);
        $seguro->data_vigencia = $dataConverter->format('Y-m-d');

        $seguro->vigente = true;

        $seguro->update();
        $seguro->funcionario()->sync($input['user']);

    }
    public function disable(int $id)
    {
        $seguro = new SeguroFuncionario();
        $item = $seguro->find($id);
        if ($item->data_vigencia == now()->format('Y-m-d')) {
            $item->vigente = false;

        }

        $item->save();

        return $item;
    }

}
