<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaDePagamento;

class FormaDePagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagamento = new FormaDePagamento();
        $lista = $pagamento->getAll();
        return view('formadepagamento.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formadepagamento.main.create');
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

            $pagamento = new FormaDePagamento();
            $pagamento->add($request->input());
            return response(["status" => "Forma de Pagamento cadastrada com sucesso"], 201);

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
        $pagamento = new FormaDePagamento();
        $item = $pagamento->get($id);
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
        $pagamento = new FormaDePagamento();
        $listaDePagamentos = $pagamento->getAll();
        $pagamentoEditado = $listaDePagamentos[$id];
        return "Formulario de edição para o".$pagamentoEditado->toJson();
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

            $pagamentoEditado = new FormaDePagamento();
            $pagamentoEditado->edit($id);
            return response(["status" => "Forma de Pagamento atualizada com sucesso"], 202);

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
            $pagamento = FormaDePagamento::where('id', $id)->first();

            if($pagamento) {

                return $pagamento->delete();
            }
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
