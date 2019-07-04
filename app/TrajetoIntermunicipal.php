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
        $lista = [];
        $trajetosDestino = $this->whereHas('trechos', function ($query) use ($destino_id, $trajeto_id) {
            $query->where('cidade_id', $destino_id)
                ->where('trajeto_id', $trajeto_id);
        })->get();

        foreach ($trajetosDestino as $trajeto) {

            $hasOrigem = false;
            $hasDestino = false;

            foreach ($trajeto->trechos as $trecho) {
                if ($trecho->cidade_id === $origem_id) {
                    if (strtotime($trecho->horarioSaida) >= time()) {
                        $trajeto->origem = $trecho;
                        $hasOrigem = true;
                    }
                }

                if ($trecho->cidade_id === $destino_id) {
                    $trajeto->destino = $trecho;
                    $hasDestino = true;
                }
            }

            if ($hasOrigem && $hasDestino) {
                array_push($lista, $trajeto);
            }

        }
        return $lista;

    }

    public function get(int $id)
    {
        $trajeto = $this->find($id);
        return $trajeto;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'cidade' => 'required|array',
            'horarioSaida' => 'required|array',
            'horarioChegada' => 'required|array',
            'quilometragem' => 'required|array',
        ]);

        $trajeto = $this->create();
        $trechos = $this->normalize($input['cidade'], $input['horarioSaida'], $input['horarioChegada'], $input['quilometragem'], $trajeto);

        $trajeto->trechos()->saveMany($trechos);

        return $this;
    }

    private function normalize(array $cidades, array $horarioSaida, array $horarioChegada, array $quilometragem, TrajetoIntermunicipal $trajeto)
    {

        $listaTrechos = [];

        for ($i = 0; $i < count($cidades); $i++) {
            array_push($listaTrechos, new Trecho([
                "trajeto_id" => $trajeto->id,
                "cidade_id" => $cidades[$i],
                "horarioSaida" => $horarioSaida[$i],
                "horarioChegada" => $horarioChegada[$i],
                "quilometragem" => $quilometragem[$i],
                "ordem" => $i,
            ]));
        }

        return $listaTrechos;
    }

    public function remove(int $id)
    {
        //
    }

}
