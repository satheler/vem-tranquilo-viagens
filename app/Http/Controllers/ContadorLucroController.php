<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\CompraPassagem;

class ContadorLucroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contador = new Contador();
        // $lista = $contador->getAll();
        return view('contador_lucro.main.index');
    }



    // public function search(Request $request) {
    //     $origem = $request->input('origem');
    //     $destino = $request->input('destino');

    //     $dataConverter = date_create_from_format('d/m/Y', $request->input('data_ida'));
    //     $data_ida = $dataConverter->format('Y-m-d');

    //     if($request->input('data_volta') !== null) {
    //         $dataConverter = date_create_from_format('d/m/Y', $request->input('data_volta'));
    //         $data_volta = $dataConverter->format('Y-m-d');
    //     }

    //     return redirect()
    //         ->route('page_compra.list', ["origem" => $origem, "destino" => $destino, "data_ida" => $data_ida, "data_volta" => $data_volta ?? null]);
    // }

    public function list($categoria_passageiro, $alocacao_intermunicipal, $tarifa_intermunicipal)
    {
       

        $compras = new CompraPassagem();
        $comp = $compras->getByFilter($categoria_passageiro_id, $alocacao_intermunicipal_id, $tarifa_intermunicipal_id);
        return view('compra.main.index', compact('categoria_passageiro_id', 'alocacao_intermunicipal_id', 'tarida_intermunicipal_id'));
    }


       


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contador_lucro.main.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ;
    }
}
