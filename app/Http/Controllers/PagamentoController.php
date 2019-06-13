<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AlocacaoIntermunicipal;
use App\Trecho;
use App\CategoriaPassageiro;
use App\Compra;
use App\Cliente;

use Cookie;

class PagamentoController extends Controller
{
    public function pagamento(Request $request){

        if(Cookie::get('form_poltronas') !== null) {
            $form = json_decode(Cookie::get('form_poltronas'));
        }

        if(Cookie::get('form_poltronas') !== null && $request === null){
            return redirect()->route('page_home.index');
        }

        $poltronas = $request->input('poltronas')  !== null ? $request->input('poltronas') : $form->poltronas;

        $alocacao = new AlocacaoIntermunicipal();
        $alocacao = $request->input('alocacao_id') !== null ? $alocacao->get($request->input('alocacao_id')) :  $alocacao->get($form->alocacao_id);

        $trecho = new Trecho();
        $origem = $request->input('trecho_origem_id') !== null ? $trecho->get($request->input('trecho_origem_id')) : $trecho->get($form->trecho_origem_id);
        $destino = $request->input('trecho_destino_id') !== null ? $trecho->get($request->input('trecho_destino_id')) : $trecho->get($form->trecho_destino_id);

        $categoria_passageiro = new CategoriaPassageiro();
        $categoria_passageiro = $categoria_passageiro->getAll();

        $valor = $request->input('totalCompra') !== null ? $request->input('totalCompra') : $form->totalCompra;
        Cookie::queue(Cookie::forget('form_poltronas'));
        return view('compra.main.pagamento', compact('poltronas', 'origem', 'destino', 'alocacao', 'categoria_passageiro', 'valor'))->withCookie(Cookie::forget('form_poltronas'));
    }

    public function store(Request $request){
        if(!isset($request['usarPontos'])){
            $request['usarPontos'] = 'off';
        }

        $compra = new Compra();
        $compra->add($request->input());

        $cliente = new Cliente();
        $cliente = $cliente->get($compra->cliente_id);

        return redirect()->route('perfilcliente.index')->withStatus(__('Compra realizada com sucesso!'));
    }
}
