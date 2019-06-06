<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DateTime;
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
        $date = new DateTime();
        $validator = Validator::make($input, [
            'tipo_causa'=>'regex:[a-zA-Z\u00C0-\u00FF ]',
            'descricao_causa'=>'required|string',
            'envolvidos'=>'required|string',
            'custo' => 'required|numeric',
            'descricao_custo'=> 'required|string',
            'data' => 'required|date_format:d/m/Y|before_or_equal:'. $date->format('d/m/Y'),
            'onibus_id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
       
        
        $this->tipo_causa= $input['tipo_causa'];
        $this->descricao_causa = $input['descricao_causa'];
        $this->envolvidos = $input['envolvidos'];
        $this->custo = $input['custo'];
        $this->descricao_custo = $input['descricao_custo'];
        $this->onibus_id = $input['onibus'];

        $dataConverter = date_create_from_format('d/m/Y', $input['data']);
        $this->data = $dataConverter->format('Y-m-d');


        $this->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
