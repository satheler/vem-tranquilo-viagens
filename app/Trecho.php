<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trecho extends Model
{
    protected $table = 'trecho';

    public function description()
    {
        return $this->morphOne('App\Trecho', 'description');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'valor' => 'valor|integer',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time',
            'origem'=> 'exists:cidade,cidade',
            'destino'=>'exists:cidade,cidade'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->valor = $input['valor'];
        $this->horarioSaida = $input['horarioSaida'];
        $this->horarioChegada = $input['horarioChegada'];
        $this->origem = $input['origem'];
        $this->destino = $input['destino'];

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $trecho = $this->find($id);

        $validator = Validator::make($input, [
            'valor' => 'valor|integer',
            'horarioSaida' => 'required|time',
            'horarioChegada' => 'required|time',
            'origem'=> 'exists:cidade,cidade',
            'destino'=>'exists:cidade,cidade'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $trecho->valor = $input['valor'];
        $trecho->horarioSaida = $input['horarioSaida'];
        $trecho->horarioChegada = $input['horarioChegada'];
        $trecho->origem = $input['origem'];
        $trecho->destino = $input['destino'];

        $trecho->save();
    }
}
