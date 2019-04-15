<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;
use Validator;

class Trecho extends Model
{
    protected $table = 'trecho';

    public function getAll()
    {
        return $this->all();
    }

    public function origem() {
        return $this->hasOne('App\Cidade', 'id', 'origem_id');
    }

    public function destino() {
        return $this->hasOne('App\Cidade', 'id', 'destino_id');
    }

    public function get(int $id){
        $trecho = $this->find($id);
        return $trecho;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'quilometragem' => 'required|numeric|min:0.1',
            'horarioSaida' => 'required|date_format:H:i',
            'horarioChegada' => 'required|date_format:H:i',
            'origem_id'=> 'required|exists:cidades,id',
            'destino_id'=>'required|exists:cidades,id|different:origem_id',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->origem_id = $input['origem_id'];
        $this->destino_id = $input['destino_id'];

        $this->quilometragem = $input['quilometragem'];
        $this->horarioSaida = $input['horarioSaida'];
        $this->horarioChegada = $input['horarioChegada'];

        $this->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
