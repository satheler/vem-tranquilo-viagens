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
            'quilometragem' => 'required|float',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time',
            'origem_id'=> 'exists:cidade,id',
            'destino_id'=>'exists:cidade,id',
            'destino_id'=>'different:origem_id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->origem_id = $input['origem_id'];
        $this->destino_id = $input['destino_id'];

        if($this->origem_id == $this->destino_id){

        }

        $this->quilometragem = $input['quilometragem'];
        $this->horarioSaida = $input['horarioSaida'];
        $this->horarioChegada = $input['horarioChegada'];


        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $trecho = $this->find($id);

        $validator = Validator::make($input, [
            'quilometragem' => 'required|float',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time',
            'origem_id'=> 'exists:cidade,id',
            'destino_id'=>'exists:cidade,id',
            'destino_id'=>'different:origem_id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $trecho->quilometragem = $input['quilometragem'];
        $trecho->horarioSaida = $input['horarioSaida'];
        $trecho->horarioChegada = $input['horarioChegada'];
        $trecho->origem_id = $input['origem_id'];
        $trecho->destino_id = $input['destino_id'];

        $trecho->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
