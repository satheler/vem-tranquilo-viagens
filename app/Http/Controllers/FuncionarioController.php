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
        $rodoviarias = new Rodoviaria();
        $lista["funcionarios"] = $tipos_funcionario->getAll();
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
        $tipos_funcionario = new TipoFuncionario();
        $rodoviaria = new Rodoviaria();
        $lista['funcionario'] = $funcionario->get($id);
        $lista['tipos_funcionario'] = $tipos_funcionario->getAll();
        $lista['rodoviaria'] = $rodoviaria->getAll();

        return view('funcionario.main.edit', compact('lista'));
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
        $funcionario = new Funcionario();
        $validator = $funcionario->edit($request->input(), $id);

        if ($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()
                ->route('funcionario.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()
                ->route('funcionario.index')
                ->withStatus(__('Funcionário editado com sucesso.'));
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
