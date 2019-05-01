<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrajetoUrbano;
use App\Cidade;
use Exception;

class TrajetoUrbanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trajeto = new TrajetoUrbano();
        $lista = $trajeto->getAll();
        return view('trajeto.urbano.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = new Cidade();
        $lista["cidades"] = $cidades->getAll();
        return view('trajeto.urbano.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trajeto = new TrajetoUrbano();
        $validator = $trajeto->add($request->input());

        if($validator === NULL) {
            return redirect()->route('trajeto_urbano.index')->withStatus(__('Trajeto adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('trajeto_urbano.create')
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
        $trajeto = new TrajetoUrbano();
        $item = $trajeto->get($id);
        return view('trajeto.urbano.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trajeto = new TrajetoUrbano();
        $listaDeTrajetos = $trajeto->getAll();
        $trajetoEditado = $listaDeTrajetos[$id];
        return "Formulario de edição para o".$trajetoEditado->toJson();
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
            $trajetoEditado = new TrajetoUrbano();
            $trajetoEditado->edit($id);
            return response(["status" => "Trajeto atualizado com sucesso"], 202);
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
        $trajeto = new TrajetoUrbano();
        return $trajeto->disable($id, $request->input());
    }
}
