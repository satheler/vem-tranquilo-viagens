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
        return $this->belongsToMany('App\Trecho', 'trajeto_trecho', 'trajeto_id', 'trecho_id')
            ->withPivot('horarioSaida')
            ->withPivot('horarioChegada');
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
