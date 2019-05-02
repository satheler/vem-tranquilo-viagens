<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seguro;
use App\TipoSeguro;
use App\Onibus;
use App\OnibusIntermunicipal;
use App\OnibusUrbano;

class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguro = new Seguro();
        $lista = $seguro->getAll();
        return view('seguroonibus.seguro.index', compact('lista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $onibus = new Onibus();
        $tipo = new TipoSeguro();
        $lista["onibus"] = $onibus->getAll();
        $lista["tipo"] = $tipo->getAll();
        return view('seguroonibus.seguro.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seguro = new Seguro();
        $validator = $seguro->add($request->input());

        if($validator == NULL) {

            return redirect()->route('seguro.index')->withStatus(__('Seguro adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('seguro.create')
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
        $seguro = new Seguro();
        $item = $seguro->get($id);

        return view('seguroonibus.seguro.show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
