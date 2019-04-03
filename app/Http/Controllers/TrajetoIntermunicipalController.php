<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $listaDeTrajetos = $trajeto->getAll();
        return view('xxx', compact('listaDeTrajetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('xxx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $trajeto = new TrajetoIntermunicipal();
            $trajeto->add($request->input());
            return response(["status" => "Trajeto cadastrado com sucesso"], 201);

        } catch (Exception $e) {
            return response($e->getMessage(), 400);
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
        $trajeto = $trajeto->get($id);
        return response($trajeto->toJson(), 200);
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
        //
    }
}
