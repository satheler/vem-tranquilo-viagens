<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\AlocacaoIntermunicipal;
use App\OnibusIntermunicipal;
use App\VendaOnline;
use App\CategoriaPassageiro;
use App\Trecho;
use App\Compra;

class CompraPassagemController extends Controller
{
    public function index()
    {
        $cidades = new Cidade();
        $cidades = $cidades->getAll();
        return view('compra.main.index', compact('cidades'));
    }

    public function search(Request $request) {
        $origem = $request->input('origem');
        $destino = $request->input('destino');

        $dataConverter = date_create_from_format('d/m/Y', $request->input('data_ida'));
        $data_ida = $dataConverter->format('Y-m-d');

        if($request->input('data_volta') !== null) {
            $dataConverter = date_create_from_format('d/m/Y', $request->input('data_volta'));
            $data_volta = $dataConverter->format('Y-m-d');
        }

        return redirect()
            ->route('page_compra.list', ["origem" => $origem, "destino" => $destino, "data_ida" => $data_ida, "data_volta" => $data_volta ?? null]);
    }

    public function list($origem, $destino, $data_ida, $data_volta = '')
    {
        $cidade = new Cidade();
        $cidades = $cidade->getAll();

        $trajetos = new AlocacaoIntermunicipal();
        $trajetos = $trajetos->getAlocacao($origem, $destino, $data_ida);

        $data_converter = date_create_from_format('Y-m-d', $data_ida);
        $data_ida = $data_converter->format('d/m/Y');

        $origem = $cidade->get($origem);
        $destino = $cidade->get($destino);

        if($data_volta != '') {
            $data_converter = date_create_from_format('Y-m-d', $data_volta);
            $data_volta = $data_converter->format('d/m/Y');
        }

        return view('compra.main.index', compact('cidades', 'trajetos', 'origem', 'destino', 'data_ida', 'data_volta'));
    }

    public function selecionarPoltrona(Request $request) {
        $alocacao = new AlocacaoIntermunicipal();
        $alocacao = $alocacao->get($request->input('alocacao_id'));

<<<<<<< Updated upstream
        $trecho = new Trecho();
        $origem = $trecho->get($request->input('trecho_origem_id'));
        $destino = $trecho->get($request->input('trecho_destino_id'));

        $valor = $request->input('valor');

        $onibus = new OnibusIntermunicipal();
        $assentos = $onibus->getAssentos($alocacao);

        return view('compra.main.show', compact('alocacao', 'origem', 'destino', 'assentos', 'valor'));
    }

    public function pagamento(Request $request){
        $poltronas = $request->input('poltronas');
        $alocacao = new AlocacaoIntermunicipal();
        $alocacao = $alocacao->get($request->input('alocacao_id'));

        $trecho = new Trecho();
        $origem = $trecho->get($request->input('trecho_origem_id'));
        $destino = $trecho->get($request->input('trecho_destino_id'));

        $categoria_passageiro = new CategoriaPassageiro();
        $categoria_passageiro = $categoria_passageiro->getAll();

        $valor = $request->input('totalCompra');

        return view('compra.main.pagamento', compact('poltronas', 'origem', 'destino', 'alocacao', 'categoria_passageiro', 'valor'));
=======
        $origem = new Cidade();
        $origem = $origem->get($request->input('origem_id'));

        $destino = new Cidade();
        $destino = $destino->get($request->input('destino_id'));

        $onibus = new OnibusIntermunicipal();
        $assentos = $onibus->getAssentos($alocacao->onibus_id);

        // exit;
        return view('compra.main.show', compact('alocacao', 'origem', 'destino', 'assentos'));
>>>>>>> Stashed changes
    }

    public function store(Request $request){
        $compra = new Compra();
        $compra->add($request->input());

        return $compra;
    }
}
