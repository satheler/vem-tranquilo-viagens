<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Trecho extends Model
{
    protected $table = 'trechos';

    protected $fillable = [
        'cidade_id', 'horarioSaida', 'horarioChegada', 'quilometragem', 'ordem', 'trajeto_id'
    ];

    public function getAll()
    {
        return $this->all();
    }

    public function cidade()
    {
        return $this->hasOne('App\Cidade', 'id', 'cidade_id');
    }

    public function get(int $id)
    {
        $trecho = $this->find($id);
        return $trecho;
    }

    public function breakTrecho(int $destino)
    {
        $lista = [];

        if ($this->cidade_id != $destino) {
            array_push($lista, $this);
        }

        return $lista;
    }

    public function contains(int $cidade)
    {
        if ($this->cidade_id == $cidade) {
            return true;
        }
        return false;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'cidade' => 'required|exists:cidades,id',
            'horarioSaida' => 'required|date_format:H:i',
            'horarioChegada' => 'required|date_format:H:i',
            'quilometragem' => 'required|numeric|min:0.1',
            'ordem' => 'required|numeric|min:0',
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
