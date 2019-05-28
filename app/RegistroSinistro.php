<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class RegistroSinistro extends Model
{
    protected $table = 'registro_sinistro';

    public function onibus()
    {
        return $this->hasOne('App\Onibus', 'id', 'onibus_id');
    }

    public function getByOnibusId(int $onibus_id) {
        return $this->where('onibus_id', $onibus_id)->get();
    }

    public function get(int $id)
    {
        $sinistro = $this->find($id);
        return $sinistro;
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'tipo_causa' => 'required|string',
            'descricao_causa' => 'required|string',
            'envolvidos' => 'required|string',
            'custo' => 'required|numeric',
            'tipo_custo' => 'required|string',
            'data' => 'required|date',
            'onibus_id' => 'required|exists:onibus,id',
        ]);

        if ($validator->fails()) {
            return $validator;
        }
       

        $this->tipo_causa= $input['tipo_causa'];
        $this->descricao_causa = $input['descricao_causa'];
        $this->envolvidos = $input['envolvidos'];
        $this->custo = $input['custo'];
        $this->descrcao_custo = $input['descricao_custo'];
        $this->data = $input['data'];
        $this->onibus_id = $input['onibus'];

        $this->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
