<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;
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

    public function getByFilter($origem_id, $destino_id)
    {

        $trecho = new Trecho();
        $trechos = $trecho->getAll();
        $caminhoDestino = $trechos->ordem->whereHas('trechos', function ($query) use ($destino_id) {
            $query->where('cidade_id', $destino_id);
        })->get();

        $this->whereHas('trechos', function ($query) use ($cidade_id, $caminhoDestino) {
            $query->where('cidade_id', $origem_id)
                  ->where('ordem', $caminhoDestino);
        })->get();
    }

    public function get(int $id){
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

    private function normalize(array $trechos, array $horarioSaida, array $horarioChegada) {

        $listaTrechos = [];

        for ($i=0; $i < count($trechos); $i++) {
            array_push($listaTrechos, [
                "trecho_id" => $trechos[$i],
                "horarioSaida" => $horarioSaida[$i],
                "horarioChegada" => $horarioChegada[$i]
            ]);
        }

        return $listaTrechos;
    }

    public function remove(int $id)
    {
        //
    }

}
