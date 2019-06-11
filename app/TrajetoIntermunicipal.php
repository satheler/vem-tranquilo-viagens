<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class TrajetoIntermunicipal extends Model
{
    protected $table = 'trajeto_intermunicipal';

    public function trechos()
    {
        return $this->hasMany('App\Trecho', 'trajeto_id', 'id');
        // return $this->hasMany('<ENTIDADE>', '<FOREING_KEY>', '<LOCAL_KEY>');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function getByFilter($origem_id, $destino_id, $trajeto_id)
    {
        $trajetosDestino = $this->whereHas('trechos', function ($query) use ($destino_id, $trajeto_id) {
            $query->where('cidade_id', $destino_id)
                  ->where('trajeto_id', $trajeto_id);
        })->get();

        foreach ($trajetosDestino as $trajeto) {

            $hasOrigem = false;
            $hasDestino = false;

            foreach ($trajeto->trechos as $trecho) {
                if($trecho->cidade_id === $origem_id)
                    $trajeto->origem = $trecho;
                    $hasOrigem = true;

                    if($trecho->cidade_id === $destino_id)
                    $trajeto->destino = $trecho;
                    $hasDestino = true;
            }

            if($hasOrigem && $hasDestino)
                return $trajeto;

        }

    }

    public function get(int $id)
    {
        $trajeto = $this->find($id);
        return $trajeto;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'trechos' => 'required|array',
            'horarioSaida' => 'required|array',
            'horarioChegada' => 'required|array',
        ]);

        $trechos = $this->normalize($input['trechos'], $input['horarioSaida'], $input['horarioChegada']);

        $this->save();
        $this->trechos()->attach($trechos);
    }

    private function normalize(array $trechos, array $horarioSaida, array $horarioChegada)
    {

        $listaTrechos = [];

        for ($i = 0; $i < count($trechos); $i++) {
            array_push($listaTrechos, [
                "trecho_id" => $trechos[$i],
                "horarioSaida" => $horarioSaida[$i],
                "horarioChegada" => $horarioChegada[$i],
            ]);
        }

        return $listaTrechos;
    }

    public function remove(int $id)
    {
        //
    }

}
