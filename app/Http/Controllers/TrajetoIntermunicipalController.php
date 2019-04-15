<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrajetoIntermunicipal;
use App\Trecho;
use Exception;

class TrajetoIntermunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trajeto = new TrajetoIntermunicipal();
        $lista = $trajeto->getAll();
        return view('trajeto.intermunicipal.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trechos = new Trecho();
        $lista = $trechos->getAll();
        return view('trajeto.intermunicipal.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trajeto = new TrajetoIntermunicipal();
        $validator = $trajeto->add($request->input());

        if($validator === NULL) {
            return redirect()->route('trajeto_intermunicipal.index')->withStatus(__('Trajeto adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('trajeto_intermunicipal.create')
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
        $trajeto = new TrajetoIntermunicipal();
        $item = $trajeto->get($id);
        return view('trajeto.intermunicipal.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trajeto = new TrajetoIntermunicipal();
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

            $trajetoEditado = new TrajetoIntermunicipal();
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
        $trajeto = new TrajetoIntermunicipal();
        return $trajeto->disable($id, $request->input());
    }
}
