<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passageiro;

class PassageiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passageiro = new Passageiro();
        $lista = $passageiro->getAll();
        return view('passageiro.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passageiro.main.create');
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

            $passageiro = new Passageiro();
            $passageiro->add($request->input());
            return response(["status" => "Tipo de passageiro cadastrado com sucesso"], 201);

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
        $passageiro = new Passageiro();
        $item = $passageiro->get($id);
        return view('passageiro.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passageiro = new Passageiro();
        $listaDePassageiros = $passageiro->getAll();
        $passageiroEditado = $listaDePassageiros[$id];
        return "Formulario de edição para o".$passageiroEditado->toJson();
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

            $passageiroEditado = new Passageiro();
            $passageiroEditado->edit($id);
            return response(["status" => "Tipo de passageiro atualizado com sucesso"], 202);

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
    public function destroy($id)
    {
        try {
            $passageiro = Passageiro::where('id', $id)->first();

            if($passageiro) {

                return $passageiro->delete();
            }
            // $passageiro = new Passageiro();
            // $passageiro->destroy($id);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
