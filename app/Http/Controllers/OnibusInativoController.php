<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Onibus;

class OnibusInativoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $onibus = new Onibus();
        $lista = $onibus->getAllInativos();
        return view('frotas.inativos.index', compact('lista'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $onibus = new Onibus();
        $item = $onibus->get($id);
        return view('frotas.inativos.show', compact('item'));
        // //if ($id >= 0 && $id < count($listadeOnibus)) {
        // $onibus = $onibus->get($id);
        // return response($onibus->toJson(), 200);
        //}
        //return response(['error' => 'Ônibus não encontrado.'], 400);
    }
}
