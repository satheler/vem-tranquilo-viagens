<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaPassageiro;

class CategoriaPassageiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CategoriaPassageiro = new CategoriaPassageiro();
        $lista = $CategoriaPassageiro->getAll();
        return view('categoria_passageiro.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria_passageiro.main.create');
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

            $CategoriaPassageiro = new CategoriaPassageiro();
            $CategoriaPassageiro->add($request->input());
            return response(["status" => "Tipo de CategoriaPassageiro cadastrado com sucesso"], 201);

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
        $CategoriaPassageiro = new CategoriaPassageiro();
        $item = $CategoriaPassageiro->get($id);
        return view('categoria_passageiro.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $CategoriaPassageiro = new CategoriaPassageiro();
        $listaDeCategoriaPassageiros = $CategoriaPassageiro->getAll();
        $CategoriaPassageiroEditado = $listaDeCategoriaPassageiros[$id];
        return "Formulario de edição para o".$CategoriaPassageiroEditado->toJson();
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

            $CategoriaPassageiroEditado = new CategoriaPassageiro();
            $CategoriaPassageiroEditado->edit($id);
            return response(["status" => "Tipo de CategoriaPassageiro atualizado com sucesso"], 202);

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
            $CategoriaPassageiro = CategoriaPassageiro::where('id', $id)->first();

            if($CategoriaPassageiro) {

                return $CategoriaPassageiro->delete();
            }
            // $CategoriaPassageiro = new CategoriaPassageiro();
            // $CategoriaPassageiro->destroy($id);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
