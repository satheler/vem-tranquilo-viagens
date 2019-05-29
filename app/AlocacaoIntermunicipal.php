<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TrajetoIntermunicipal;
use App\TarifaIntermunicipal;
use App\Tarifa;
use Validator;
use DateTime;
use Date;

class AlocacaoIntermunicipal extends Model
{
    protected $table = 'alocacao_intermunicipal';

    public function onibus() {
        return $this->hasOne('App\OnibusIntermunicipal', 'id', 'onibus_id');
    }
    public function trajeto() {
        return $this->hasOne('App\TrajetoIntermunicipal', 'id', 'trajeto_id');
    }
    public function motorista() {
        return $this->hasOne('App\Funcionario', 'id', 'motorista_id');
    }
    public function auxiliar() {
        return $this->hasOne('App\Funcionario', 'id', 'auxiliar_id');
    }

    public function getAll() {
        return $this->all();
    }

    public function getAlocacao(int $origem, int $destino, string $inputData) {

        $dataConverter = date_create_from_format('d/m/Y', $inputData);
        $data = $dataConverter->format('Y-m-d');

        $lista["trajeto"] = [];
        $lista["onibus"] = [];
        $lista["valor"] = [];

        $alocacaoData = $this->where('data', $data)->get();

        foreach ($alocacaoData as $itemAlocacao) {
            array_push($lista["trajeto"], $itemAlocacao->trajeto->getByFilter($origem,$destino,$itemAlocacao->trajeto_id));
            array_push($lista["onibus"], $itemAlocacao->onibus);
            array_push($lista["valor"], $this->calculaValor($itemAlocacao->trajeto));
        }

        return $lista;
    }

    public function calculaValor(TrajetoIntermunicipal $trajeto){

        $itemTarifa = Tarifa::where(function ($query){
            $query->where('data', '<=' ,now()->format('Y-m-d'))
                  ->where('description_type', 'App\TarifaIntermunicipal');
        })->get();

        foreach ($itemTarifa as $item) {
            $id = $item->id;
        }

        $intermunicipal = new TarifaIntermunicipal();
        $item = $intermunicipal->get($id);

        $valor = $item->description->valor;

        foreach ($trajeto->trechos as $itemTrecho) {
            $result = $itemTrecho->quilometragem*$valor;
        }

        return $result;
    }
}
