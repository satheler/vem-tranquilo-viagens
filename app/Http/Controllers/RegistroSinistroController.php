<?php

namespace App\Http\Controllers;

use App\Onibus;
use App\RegistroSinistro;
use Illuminate\Http\Request;

class RegistroSinistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinistro = new RegistroSinistro();
        $lista = $sinistro->getAll();
        return view('registro_sinistro.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $onibus = new Onibus();
        $lista["onibus"] = $onibus->getAll();
        return view('registro_sinistro.main.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sinistro = new RegistroSinistro();
        $validator = $sinistro->add($request->input());

        if($validator === NULL) {
            return redirect()->route('sinistro.index')->withStatus(__('Sinistro adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('sinistro.create')
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
        $sinistro = new RegistroSinistro();
        $lista["sinistro"] = $sinistro->get($id);

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
        $sinistro = new RegistroSinistro();
        $lista["sinistro"] = $sinistro->get($id);
        $onibus = new Onibus();
        $lista["onibus"] = $onibus->getAll();

        return view('sinistro.main.edit', compact('lista'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        $sinistro = new RegistroSinistro();
        $validator = $sinistro->edit($request->input(), $id);

        if ($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()
                ->route('sinistro.main.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()
                ->route('sinistro.main.index')
                ->withStatus(__('Sinistro editado com sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinistro = new RegistroSinistro();
        $sinistro->inactive($id);

        return response("Alterado com sucesso", 202);
    }
}
