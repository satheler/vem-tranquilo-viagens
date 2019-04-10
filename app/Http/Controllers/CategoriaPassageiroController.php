<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaPassageiro;
use Exception;

class CategoriaPassageiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaPassageiro = new CategoriaPassageiro();
        $lista = $categoriaPassageiro->getAll();
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
        $categoriaPassageiro = new CategoriaPassageiro();
        $validator = $categoriaPassageiro->add($request->input());

        if($validator === NULL) {
            return redirect()->route('categoria_Passageiro.index')->withStatus(__('Forma de pagamento adicionada com sucesso.'));
        } else {
            return redirect()
                    ->route('categoria_Passageiro.create')
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
        $categoriaPassageiro = new CategoriaPassageiro();
        $item = $categoriaPassageiro->get($id);
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
        $categoriaPassageiro = new CategoriaPassageiro();
        $listaDeCategoriaPassageiros = $categoriaPassageiro->getAll();
        $categoriaPassageiroEditado = $listaDeCategoriaPassageiros[$id];
        return "Formulario de edição para o".$categoriaPassageiroEditado->toJson();
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

            $categoriaPassageiroEditado = new CategoriaPassageiro();
            $categoriaPassageiroEditado->edit($id);
            return response(["status" => "Tipo de categoria de Passageiro atualizado com sucesso"], 202);

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
        $categoriaPassageiro = new CategoriaPassageiro();
        return response($categoriaPassageiro->remove($id), 204);
    }
}
