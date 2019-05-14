<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Validator;

class RegistroManutencao extends Model
{
    protected $table = 'registro_manutencao';

    public function getAll()
    {
        return $this->all();
    }

    public function onibus(){
        return $this->hasOne('App\Onibus', 'id', 'onibus_id');
    }

    public function getId(int $id){
        return $this->where('onibus_id', $id)->get()->first();
    }

    public function get(int $id){
        $registro = $this->where($id);
        return $registro;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'motivo' => 'required|string',
            'oficina' => 'required|string',
            'orcamento' => 'required|numeric|min:0.01',
            'data_entrada' => 'required|string',
            'data_saida' => 'required|string',
            'valor_final' => 'required|numeric|min:0.01',
            'observacao' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->motivo = $input['motivo'];
        $this->oficina = $input['oficina'];
        $this->orcamento = $input['orcamento'];
        $this->data_entrada = $input['data_entrada'];
        $this->data_saida = $input['data_saida'];
        $this->valor_final = $input['valor_final'];
        $this->observacao = $input['observacao'];

        $this->save();
    }

    public function edit(int $id, array $input)
    {

        $registro = $this->find($id);

        $validator = Validator::make($input, [
            'data_saida' => 'required|string',
            'valorTotal' => 'required|numeric|min:0.01',
            'observacao' => 'required|string'

        ]);
        if ($validator->fails()) {
            return $validator;
        }
        
        $data_converter = date_create_from_format('Y-m-d', $input['data']);
        $this->data_saida = $data_converter;
        $this->valor_final = $input['valorTotal'];
        $this->observacao = $input['observacao'];

        $registro->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
