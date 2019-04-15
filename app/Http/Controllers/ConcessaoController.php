<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concessao;
use Exception;

class ConcessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concessao = new Concessao();
        $lista = $concessao->getAll();
        return view('concessao.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concessao.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //try {
            $concessao = new Concessao();
            $validator = $concessao->add($request->input());

            if($validator === NULL) {
                return redirect()->route('concessao.index')->withStatus(__('Concessão registrada com sucesso.'));
            } else {
                return redirect()
                        ->route('concessao.create')
                        ->withErrors($validator)
                        ->withInput();
            }

        // } catch (Exception $e) {
        //     return response($e->getMessage(), 400);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concessao = new Concessao();
        $item = $concessao->get($id);
        return view('concessao.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concessao = new Concessao();
        $listaDeConcessao = $concessao->getAll();
        $concessaoEditada = $listaDeConcessao[$id];
        return "Formulario de edição para o".$concessaoEditada->toJson();
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

            $concessaoEditada = new Concessao();
            $concessaoEditada->edit($id);
            return response(["status" => "Concessão atualizado com sucesso"], 202);

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
        $concessao = new Concessao();
        return response($concessao->remove($id), 204);
    }
}
