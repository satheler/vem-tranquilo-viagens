<?php

namespace App;

use App\Tarifa;
use App\TarifaIntermunicipal;
use App\TrajetoIntermunicipal;
use Illuminate\Database\Eloquent\Model;

class AlocacaoIntermunicipal extends Model
{
    protected $table = 'alocacao_intermunicipal';

    public function onibus()
    {
        return $this->hasOne('App\OnibusIntermunicipal', 'id', 'onibus_id');
    }
    public function trajeto()
    {
        return $this->hasOne('App\TrajetoIntermunicipal', 'id', 'trajeto_id');
    }
    public function motorista()
    {
        return $this->hasOne('App\Funcionario', 'id', 'motorista_id');
    }
    public function auxiliar()
    {
        return $this->hasOne('App\Funcionario', 'id', 'auxiliar_id');
    }

    public function get($id)
    {
        return $this->find($id);
    }

    public function getAll()
    {
        return $this->all();
    }

    public function getAlocacao(int $origem, int $destino, string $inputData)
    {
        $lista = [];

        $alocacaoData = $this->where('data', $inputData)->get();

        foreach ($alocacaoData as $itemAlocacao) {
            $item = [];
            $item["id"] = $itemAlocacao->id;
            $item["onibus"] = $itemAlocacao->onibus;

            $trajetos = $itemAlocacao->trajeto->getByFilter($origem, $destino, $itemAlocacao->trajeto_id);
            
            //foreach ($trajetos as $trajeto) {
                if($trajetos != null){
                    if($trajetos->origem->ordem < $trajetos->destino->ordem) {
                        $item["info"] = $trajetos;//array_push?
                    } else {
                        return null;
                    }
                }else{
                    return null;
                }               
            //}

            $item["valor"] = $this->calculaValor($itemAlocacao->trajeto);
            array_push($lista, $item);
        }

        return $lista;
    }

    public function calculaValor(TrajetoIntermunicipal $trajeto)
    {

        $itemTarifa = Tarifa::where(function ($query) {
            $query->where('data', '<=', now()->format('Y-m-d'))
                ->where('description_type', 'App\TarifaIntermunicipal');
        })->get();

        foreach ($itemTarifa as $item) {
            $id = $item->id;
        }

        $intermunicipal = new TarifaIntermunicipal();
        $item = $intermunicipal->get($id);

        $valor = $item->description->valor;

        foreach ($trajeto->trechos as $itemTrecho) {
            $result = $itemTrecho->quilometragem * $valor;
        }

        return $result;
    }
}
