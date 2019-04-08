<?php

namespace App\Http\Controllers;

use App\OnibusUrbano;
use Exception;
use Illuminate\Http\Request;

class OnibusUrbanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onibus = new OnibusUrbano();
        $lista = $onibus->getAll();
        return view('frotas.urbano.index', compact('lista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frotas.urbano.create');
        // return "Formulário cadastro";
        //return view('cadastroOnibusUrbano');
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

            $onibus = new OnibusUrbano();
            $onibus->add($request->input());
            return response(["status" => "Ônibus cadastrado com sucesso"], 201);

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
        $onibus = new OnibusUrbano();
        $item = $onibus->get($id);
        return view('frotas.urbano.show', compact('item'));
        // //if ($id >= 0 && $id < count($listadeOnibus)) {
        // $onibus = $onibus->get($id);
        // return response($onibus->toJson(), 200);
        //}
        //return response(['error' => 'Ônibus não encontrado.'], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onibus = new OnibusUrbano();
        $listadeOnibus = $onibus->getAll();
        $onibuseditado = $listadeOnibus[$id];
        return "Formulario de edição para o" . $onibuseditado->toJson();

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

            $onibuseditado = new OnibusUrbano();
            $onibuseditado->edit($id);
            return response(["status" => "Ônibus atualizado com sucesso"], 202);

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
    public function destroy(Request $request, $id)
    {
        $onibus = new OnibusUrbano();
        return $onibus->disable($id, $request->input());
    }
}
