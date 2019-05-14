<?php

namespace App;

use App\AlocacaoUrbano;
use App\PassagemUrbana;
use App\TarifaUrbano;
use App\TrajetoUrbano;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class PassagemUrbana extends Model
{
    protected $table = 'passagem_urbana';

    public function alocacao()
    {
        return $this->hasOne('App\AlocacaoUrbano', 'id', 'alocacao_urbana_id');
    }

    public function categoria()
    {
        return $this->hasOne('App\CategoriaPassageiro', 'id', 'categoria_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id)
    {
        $passagem = $this->find($id);
        return $passagem;
    }

    public function calcularValorPassagem(TarifaUrbano $tarifa, PassagemUrbana $passagem)
    {

        $categoria = $passagem->categoria;
        $desconto = $categoria->desconto;
        $valorPassagem = $tarifa->description->valor;
        $valor = $valorPassagem - ($tarifa->description->valor * ($desconto / 100));

        return $valor;

    }

    public function agruparPorCategoria(TarifaUrbano $tarifa, PassagemUrbana $passagem)
    {
        $categoria["categoria"] = $passagem->categoria;
         $categoria["valores"] = [];
         array_push($categoria["valores"], $passagem->calcularValorPassagem($tarifa, $passagem));


        //  $categoria = \DB::table('passagem_urbana')
        //      ->select('categoria_id', \DB::raw($passagem->calcularValorPassagem($tarifa, $passagem) . ' as valor'))
        //      ->groupBy('categoria_id');

        return $categoria;

    }

    public function calcularLucroMensal()
    {
        $alocacao = new AlocacaoUrbano();
        $tarifa = new TarifaUrbano();
        $passagem = new PassagemUrbana();
        $trajeto = new TrajetoUrbano();

        $datavenda = new DateTime('yesterday');
        // $passagem->where('data_venda', "2019-05-*")->get();
        $lista["valor"] = [];

        $lista["passagem"] = $passagem->getAll();

        foreach ($lista["passagem"] as $itempassagem) {
            $datavenda = date_create_from_format('Y-m-d', $itempassagem->data_venda);
            $lista["mes"] = $datavenda->format('m');
            $lista["alocacao"] = $itempassagem->alocacao;
            $lista["valor"] = $itempassagem->agruparPorCategoria($tarifa->get($itempassagem->alocacao->trajeto->tarifa->id), $itempassagem);
           // array_push($categoria["valor"], $itempassagem->agruparPorCategoria($tarifa->get($itempassagem->alocacao->trajeto->tarifa->id), $itempassagem));
            $lista["cobrador"] = $itempassagem->alocacao->cobrador;
            $lista["onibus"] = $itempassagem->alocacao->onibus;

        }

        return $lista;
    }

}
