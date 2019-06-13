<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PassagemIntermunicipal;
use App\VendaOnline;

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
            $datavenda = date_create_from_format('Y-m-d', $itempassagem->data_venda);
            $item->mes = $datavenda->format('m');
            $item->trajeto = Trajeto::where('trajeto_id', $itempassagem->alocacao->trajeto_id)->get();
            $item->valor = $itempassagem->valor;
            //$lista["valor"] = $itempassagem->agruparPorCategoria($tarifa->get($itempassagem->alocacao->trajeto->tarifa->id), $itempassagem);
           // array_push($categoria["valor"], $itempassagem->agruparPorCategoria($tarifa->get($itempassagem->alocacao->trajeto->tarifa->id), $itempassagem));
            $item->user = $itempassagem->user->name;
            $item->onibus = $itempassagem->alocacao->onibus;

            array_push($lista, $item);
        }
        return $lista;
    }
}
