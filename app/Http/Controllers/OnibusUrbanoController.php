<?php

namespace App\Http\Controllers;

use App\OnibusUrbano;
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
        $listadeOnibus = $onibus->getAll();
        return view('welcome', compact('listaDeOnibus'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Formulário cadastro";
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
            return $onibus->add($request);

        } catch (Exception $e) {
            return response(['error' => 'Requisição inválida.'], 400);
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
        $onibuse = new OnibusUrbano();
        $listadeOnibus = $onibus->getAll();
        if ($id >= 0 && $id < count($listadeOnibus)) {
            return $listadeOnibus[$id]->toJson();
        }
        return response(['error' => 'Ônibus não encontrado.'], 400);
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
        return "Formulario de edição para o".$onibuseditado->toJson();

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
            return $onibuseditado->editar($request, $id);

        } catch (Exception $e) {
            return response(['error' => 'Requisição inválida.'], 400);
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
        return response(['error' => 'Função não permitida.'], 501);
    }
}
