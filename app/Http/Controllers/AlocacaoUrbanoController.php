<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlocacaoUrbano;
use App\TrajetoUrbano;
use App\Funcionario;
use App\OnibusUrbano;

use Exception;
use Auth;

class AlocacaoUrbanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alocacao = new AlocacaoUrbano();
        $lista = $alocacao->getAll();
        return view('alocacao.urbano.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trajetosUrbanos = new TrajetoUrbano();
        $lista["trajetos"] = $trajetosUrbanos->getAll();

        $onibus = new OnibusUrbano();
        $lista["onibus"] = $onibus->getByCidade(Auth::user()->cidade_id);

        $funcionarios = new Funcionario();
        $lista["motoristas"] = $funcionarios->getByTipoId(1);
        $lista["cobradores"] = $funcionarios->getByTipoId(2);
        $lista["auxiliares"] = $funcionarios->getByTipoId(3);
        return view('alocacao.urbano.main.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alocacao = new AlocacaoUrbano();
        $validator = $alocacao->add($request->input());

        if($validator === NULL) {
            return redirect()->route('alocacao_urbano.index')->withStatus(__('Alocação de Funcionario realizada com sucesso.'));
        } else {
            return redirect()
                    ->route('alocacao_urbano.create')
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
        $alocacao = new AlocacaoUrbano();
        $item = $alocacao->get($id);
        return view('alocacao.urbano.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trajetosUrbanos = new TrajetoUrbano();
        $lista["trajetos"] = $trajetosUrbanos->getAll();

        $onibus = new OnibusUrbano();
        $lista["onibus"] = $onibus->getByCidade(Auth::user()->cidade_id);

        $funcionarios = new Funcionario();
        $lista["motoristas"] = $funcionarios->getByTipoId(1);
        $lista["cobradores"] = $funcionarios->getByTipoId(2);
        $lista["auxiliares"] = $funcionarios->getByTipoId(3);

        $alocacao = new AlocacaoUrbano();
        $lista["alocacao"] = $alocacao->get($id);

        return view('alocacao.urbano.main.edit', compact('lista'));
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
        $alocacao = new AlocacaoUrbano();
        $validator = $alocacao->edit($id, $request->input());

        if($validator === NULL) {
            return redirect()->route('alocacao_urbano.index')->withStatus(__('Alocação de Funcionario editada com sucesso.'));
        } else {
            return redirect()
                    ->route('alocacao_urbano.edit', $id)
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
        $alocacao = new AlocacaoUrbano();
        return response($alocacao->inactivate($id), 204);
    }
}
