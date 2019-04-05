<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TarifaUrbano;

class TarifaUrbanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifa = new TarifaUrbano();
        $lista = $tarifa->getAll();
        return view('tarifa.urbano.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifa.urbano.create');
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

            $tarifa = new TarifaUrbano();
            $tarifa->add($request->input());
            return response(["status" => "Tarifa alterada com sucesso"], 201);

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
        $tarifa = new TarifaUrbano();
        $item = $tarifa->get($id);
        return view('tarifa.urbano.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifa = new TarifaUrbano();
        $listaDeTarifas = $tarifa->getAll();
        $tarifaEditada = $listaDeTarifas[$id];
        return "Formulario de edição para a".$tarifaEditada->toJson();
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
        //
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
