<?php

namespace App\Http\Controllers;

use App\OnibusIntermunicipal;
use Exception;
use Illuminate\Http\Request;

class OnibusIntermunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onibus = new OnibusIntermunicipal();
        $lista = $onibus->getAll();
        return view('frotas.intermunicipal.index', compact('lista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frotas.intermunicipal.create');
        // return "Formulário cadastro";
        //return view('cadastroOnibusIntermunicipal');
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

            $onibus = new OnibusIntermunicipal();
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
        $onibus = new OnibusIntermunicipal();
        $item = $onibus->get($id);
        return view('frotas.intermunicipal.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onibus = new OnibusIntermunicipal();
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

            $onibuseditado = new OnibusIntermunicipal();
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

        $onibus = new OnibusIntermunicipal();
        return $onibus->disable($id, $request->input());
        // return "true";
        return response(['error' => 'Função não permitida.'], 501);
    }
}
