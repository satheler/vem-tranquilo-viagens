<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;

class VendaPassagemIntermunicipal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = new Cidade();
        $lista["cidade"] = $cidades->getAll();
        return view('venda_passagens_intermunicipal.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista = [];
        return view('venda_passagens_intermunicipal.main.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $onibus = new OnibusUrbano();
        $validator = $onibus->add($request->input());

        if($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()
                ->route('ROTA_PARA_PAGAMENTO_DA_PASSAGEM');
        } else {
            return redirect()
                    ->route('venda_passagens_intermunicipal.create')
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
        $lista = [];
        return view('venda_passagens_intermunicipal.main.show', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response('Metodo não implementado', 501);
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
        return response('Metodo não implementado', 501);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response('Metodo não implementado', 501);
    }
}
