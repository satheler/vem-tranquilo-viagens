<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlocacaoIntermunicipal;
use Exception;

class AlocacaoIntermunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alocacao = new AlocacaoIntermunicipal();
        $lista = $alocacao->getAll();
        return view('alocacao.intermunicipal.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alocacao.intermunicipal.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alocacao = new AlocacaoIntermunicipal();
        $validator = $alocacao->add($request->input());

        if($validator === NULL) {
            return redirect()->route('alocacao.intermunicipal.index')->withStatus(__('Alocação de Funcionario feita com sucesso.'));
        } else {
            return redirect()
                    ->route('alocacao.intermunicipal.create')
                    ->withErrors($validator)
                    ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alocacao = new AlocacaoIntermunicipal();
        $item = $alocacao->get($id);
        return view('alocacao.intermunicipal.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alocacao = new AlocacaoIntermunicipal();
        $listaDeAlocacoes = $alocacao->getAll();
        $alocacaoEditada = $listaDeAlocacoes[$id];
        return "Formulario de edição para o".$alocacaoEditada->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $alocacaoEditada = new AlocacaoIntermunicipal();
            $alocacaoEditada->edit($id);
            return response(["status" => "Alocação de funcionário atualizada com sucesso"], 202);

        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alocacao = new AlocacaoIntermunicipal();
        return response($alocacao->remove($id), 204);
    }
}
