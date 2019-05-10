<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Rodoviaria;
use Illuminate\Http\Request;

class RodoviariasInativasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rodoviaria = new Rodoviaria();
        $lista = $rodoviaria->getAll(false);
        return view('rodoviarias.inativas.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rodoviaria = new Rodoviaria();
        $lista["rodoviaria"] = $rodoviaria->get($id);

        return view('rodoviarias.main.show', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rodoviaria = new Rodoviaria();
        $lista["rodoviaria"] = $rodoviaria->get($id);
        $cidades = new Cidade();
        $lista["cidade"] = $cidades->getAll();

        return view('rodoviarias.inativas.edit', compact('lista'));
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
        $rodoviarias = new Rodoviaria();
        $validator = $rodoviarias->edit($request->input(), $id);

        if ($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()
                ->route('rodoviarias_inativas.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()
                ->route('rodoviarias_inativas.index')
                ->withStatus(__('Rodoviarias editada com sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rodoviarias = new Rodoviaria();
        $rodoviarias->inactive($id);

        return response("Alterado com sucesso", 202);
    }
}
