<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()// Não deve ficar aqui !
    {

        $cliente = new Cliente();
        $cliente = $cliente->where(['user_id' => Auth::user()->id])->first();//$id do cliente que está logado, não sei como fazer
        $compras = $cliente->listarCompras();
        
        return view('perfilcliente.index', compact('cliente', 'compras'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = new Cliente();
        $cliente = $cliente->get(1);
        $lista['pontos'] = $cliente->pontos;
        $lista['nome'] = $cliente->user->name;
        $lista['cpf'] = $cliente->cpf;
        $lista['id'] = $cliente->id;
        return view('perfilcliente.show', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
