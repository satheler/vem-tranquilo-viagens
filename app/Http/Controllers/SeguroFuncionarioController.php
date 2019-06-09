<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeguroFuncionario;
use App\User;

class SeguroFuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguroFuncionario = new SeguroFuncionario();
        $lista = $seguroFuncionario->getAll();
        return view('segurofuncionario.segurofuncionario.index', compact('lista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $seguroFuncionario = new SeguroFuncionario();
        $lista["user"] = $user->getAll();
        $listaSeguroFuncionario = $seguroFuncionario->getAll();

        foreach ($lista["user"] as $itemuser) {
            foreach ($listaSeguroFuncionario as $itemSeguroFuncionario) {
                $itemSeguroFuncionario->disable($itemSeguroFuncionario->id);
            }
        }

        return view('segurofuncionario.segurofuncionario.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seguroFuncionario = new SeguroFuncionario();
        $validator = $seguroFuncionario->add($request->input());


        if($validator == NULL) {

            return redirect()->route('segurofuncionario.index')->withStatus(__('Seguro adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('segurofuncionario.create')
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
        $seguroFuncionario = new SeguroFuncionario();
        $item = $seguroFuncionario->get($id);

        return view('segurofuncionario.segurofuncionario.show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $seguroFuncionario = new SeguroFuncionario();
        $user = new User();
        $lista["user"] = $user->getAll();
        $listaSeguroFuncionario = $seguroFuncionario->getAll();
        $lista["seguro"] = $seguroFuncionario->get($id);

        foreach ($lista["user"] as $itemuser) {
            foreach ($listaSeguroFuncionario as $itemSeguroFuncionario) {
                $itemSeguroFuncionario->disable($itemSeguroFuncionario->id);
            }
        }

        $dataConverterInicio = date_create_from_format('Y-m-d', $lista['seguro']->data_inicio);
        $dataInicio = $dataConverterInicio->format('d/m/Y');

        $dataConverter = date_create_from_format('Y-m-d',  $lista['seguro']->data_vigencia);
        $dataFim = $dataConverter->format('d/m/Y');


        $lista["data"] = [];
        array_push($lista["data"], $dataInicio, $dataFim);

        return view('segurofuncionario.segurofuncionario.edit', compact('lista'));
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

            $seguroFuncionario = new SeguroFuncionario();
            $seguroFuncionario = $seguroFuncionario->get($id);
            $validator = $seguroFuncionario->edit($id, $request->input());

            if($validator == NULL) {

                return redirect()->route('segurofuncionario.index')->withStatus(__('Seguro editado com sucesso.'));
            } else {
                return redirect()
                        ->route('segurofuncionario.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
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
