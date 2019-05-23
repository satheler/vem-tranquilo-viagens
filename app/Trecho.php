<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;
use Validator;

class Trecho extends Model
{
    protected $table = 'trechos';

    public function getAll()
    {
        return $this->all();
    }

    public function cidade() {
        return $this->hasOne('App\Cidade', 'id', 'cidade_id');
    }

    public function get(int $id){
        $trecho = $this->find($id);
        return $trecho;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'cidade'=> 'required|exists:cidades,id',
            'horarioSaida' => 'required|date_format:H:i',
            'horarioChegada' => 'required|date_format:H:i',
            'quilometragem' => 'required|numeric|min:0.1',
            'ordem' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->cidade_id = $input['cidade'];
        $this->quilometragem = $input['quilometragem'];
        $this->horarioSaida = $input['horarioSaida'];
        $this->horarioChegada = $input['horarioChegada'];
        $this->quilometragem = $input['quilometragem'];
        $this->ordem = $input['ordem'];

        $this->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
