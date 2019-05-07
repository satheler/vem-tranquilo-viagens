<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Exception;
use Validator;

class TrajetoUrbano extends Model
{
    protected $table = 'trajeto_urbano';

    public function endereco() {
        return $this->hasOne('App\Cidade', 'id', 'endereco_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $trajeto = $this->find($id);
        return $trajeto;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'qntParadas' => 'required|integer',
            'terminal' => 'required|string',
            'horarioSaida' => 'required|date_format:H:i',
            'horarioChegada' => 'required|date_format:H:i',
            'quilometragem' => 'required|numeric'
        ]);

        if ($validator->fails()) {
           return $validator;
        }

        $this->qntParadas = $input['qntParadas'];
        $this->terminal = $input['terminal'];
        $this->horarioSaida = $input['horarioSaida'];
        $this->horarioChegada = $input['horarioChegada'];
        $this->quilometragem = $input['quilometragem'];
        $this->cidade_id = Auth::user()->cidade_id;

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $trajeto = $this->find($id);

        $validator = Validator::make($input, [
            'qntParadas' => 'required|integer',
            'terminal' => 'required|string',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time',
            'endereco_id'=> 'existis:cidade,id'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $trajeto->qntParadas = $input['qntParadas'];
        $trajeto->terminal = $input['terminal'];
        $trajeto->horarioSaida = $input['horarioSaida'];
        $trajeto->horarioChegada = $input['horarioChegada'];
        $trajeto->endereco_id = $input['endereco_id'];


        $trajeto->save();
    }

    public function remove(int $id){

 //
    }
}
