<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\TipoFuncionario;
use App\Cidade;
use App\Rodoviaria;
use Exception;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionario = new Funcionario();
        $lista = $funcionario->getAll();
        return view('funcionario.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_funcionario = new TipoFuncionario();
        $cidades = new Cidade();
        $rodoviarias = new Rodoviaria();
        $lista["funcionarios"] = $tipos_funcionario->getAll();
        $lista["cidades"] = $cidades->getAll();
        $lista["rodoviarias"] = $rodoviarias->getAll();
        return view('funcionario.main.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionario();
        $validator = $funcionario->add($request->input());

        if($validator === NULL) {
            return redirect()->route('funcionario.index')->withStatus(__('Funcionário adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('funcionario.create')
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
        $funcionario = new Funcionario();
        $item = $funcionario->get($id);
        return view('funcionario.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = new Funcionario();
        $listaDeFuncionarios = $funcionario->getAll();
        $funcionarioEditado = $listaDeFuncionarios[$id];
        return view('funcionario.main.edit', compact('funcionarioEditado'));
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

            $funcionarioEditado = new Funcionario();
            $funcionarioEditado->edit($id);
            return response(["status" => "Funcionário atualizado com sucesso"], 202);

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
        $funcionario = new Funcionario();
        return response($funcionario->remove($id), 204);
    }
}
