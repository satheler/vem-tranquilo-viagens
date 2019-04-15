<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trecho;
use App\Cidade;
use Exception;

class TrechoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trecho = new Trecho();
        $lista = $trecho->getAll();
        return view('trajeto.trecho.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = new Cidade();
        $lista = $cidades->getAll();
        $lista = $lista->sortBy('nome');
        return view('trajeto.trecho.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trecho = new Trecho();
        $validator = $trecho->add($request->input());

        if($validator === NULL) {
            return redirect()->route('trajeto_trecho.index')->withStatus(__('Trecho adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('trajeto_trecho.create')
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
        $trecho = new Trecho();
        $item = $trecho->get($id);
        return view('trecho.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trecho = new Trecho();
        $listaDeTrechos = $trecho->getAll();
        $trechoEditado = $listaDeTrechos[$id];
        return "Formulario de edição para o".$trechoEditado->toJson();
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

            $trechoEditado = new Trecho();
            $trechoEditado->edit($id);
            return response(["status" => "Trecho atualizado com sucesso"], 202);

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
        $trecho = new Trecho();
        return response($trecho->remove($id), 204);
    }
}
