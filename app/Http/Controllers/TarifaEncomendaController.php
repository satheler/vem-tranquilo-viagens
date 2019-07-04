<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TarifaEncomenda;
use Exception;

class TarifaEncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifa = new TarifaEncomenda();
        $lista = $tarifa->getAll();
        return view('tarifa.encomenda.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifa.encomenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifa = new TarifaEncomenda();
        $validator = $tarifa->add($request->input());

        if(!($validator instanceof \Illuminate\Validation\Validator)) {
            return redirect()->route('tarifa_encomenda.index')->withStatus(__('Tarifa Encomenda adicionada com sucesso.'));
        } else {
            return redirect()
                    ->route('tarifa_encomenda.create')
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
        $tarifa = new TarifaEncomenda();
        $item = $tarifa->get($id);
        return view('tarifa.encomenda.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
