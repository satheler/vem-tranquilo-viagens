<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seguro;
use App\Frota;
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
        $seguro = new Trecho();
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
        $seguro = new Seguro();
        $lista = $seguro->getAll();
        return view('seguroonibus.seguro.main.create', compact('lista'));
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

            return redirect()->route('seguroonibus.seguro.index')->withStatus(__('Seguro adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('seguroonibus.seguro.create')
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

        return $item->toJson();
        //return view('seguro.show', compact('item'));

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
