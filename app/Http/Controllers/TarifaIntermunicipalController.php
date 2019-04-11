<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TarifaIntermunicipal;
use Exception;

class TarifaIntermunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifa = new TarifaIntermunicipal();
        $lista = $tarifa->getAll();
        return view('tarifa.intermunicipal.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifa.intermunicipal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifa = new TarifaIntermunicipal();
        $validator = $tarifa->add($request->input());

        if(!($validator instanceof \Illuminate\Validation\Validator)) {
            return redirect()->route('tarifa_intermunicipal.index')->withStatus(__('Tarifa intermunicipal adicionada com sucesso.'));
        } else {
            return redirect()
                    ->route('tarifa_intermunicipal.create')
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
        $tarifa = new TarifaIntermunicipal();
        $item = $tarifa->get($id);
        return view('tarifa.intermunicipal.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifa = new TarifaIntermunicipal();
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
