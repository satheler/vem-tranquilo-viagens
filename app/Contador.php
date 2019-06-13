<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PassagemIntermunicipal;
use DateTime;
use App\VendaOnline;
use App\OnibusIntermunicipal;
use App\User;

class Contador extends Model
{
    public function listar(){

    }

    public function agruparPorCategoria(TarifaUrbano $tarifa, PassagemUrbana $passagem)
    {
        // $categoria["categoria"] = $passagem->categoria;
        // $categoria["valores"] = [];
        // array_push($categoria["valores"], $passagem->calcularValorPassagem($tarifa, $passagem));
        //  $categoria = \DB::table('passagem_urbana')
        //      ->select('categoria_id', \DB::raw('count(*) as as valor'))
        //      ->groupBy('categoria_id');
        // return $categoria;
    }
    public function calcularLucroMensal()
    {
        $passagem = new PassagemIntermunicipal();
        $listaPassagem = $passagem->getAll();
        $lista = [];
        
        foreach ($listaPassagem as $itempassagem) {
            $data = new DateTime($itempassagem->data_venda);

            //$datavenda = date_create_from_format('Y-m-d', $itempassagem->data_venda);
            $itempassagem->mes = $data->format('m');
           // $item->trajeto = Trecho::where('trajeto_id', $itempassagem->alocacao->trajeto_id)->get();
            $itempassagem->valor = $itempassagem->valor;
            //$lista["valor"] = $itempassagem->agruparPorCategoria($tarifa->get($itempassagem->alocacao->trajeto->tarifa->id), $itempassagem);
           // array_push($categoria["valor"], $itempassagem->agruparPorCategoria($tarifa->get($itempassagem->alocacao->trajeto->tarifa->id), $itempassagem));
            $itempassagem->user = $itempassagem->user;
            $onibus = new OnibusIntermunicipal();
            $itempassagem->onibus = $onibus->get(1);

            array_push($lista, $itempassagem);
        }
        return $lista;
    }
}
