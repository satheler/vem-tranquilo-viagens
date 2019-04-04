<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;
use Validator;

class TrajetoLocal extends Model
{
    protected $table = 'trajeto_local';

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'qntParadas' => 'required|integer',
            'terminal' => 'required|string',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->qntParadas = $input['qntParadas'];
        $this->terminal = $input['terminal'];
        $this->horarioSaida = $input['horarioSaida'];
        $this->horarioChegada = $input['horarioChegada'];

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $trajeto = $this->find($id);

        $validator = Validator::make($input, [
            'qntParadas' => 'required|integer',
            'terminal' => 'required|string',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $trajeto->qntParadas = $input['qntParadas'];
        $trajeto->terminal = $input['terminal'];
        $trajeto->horarioSaida = $input['horarioSaida'];
        $trajeto->horarioChegada = $input['horarioChegada'];

        $trajeto->save();
    }

    // public function destroy(int $id){

    //     $this->destroy($id);
    //     //return response();
    // }
}
