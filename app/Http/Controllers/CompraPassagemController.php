<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\TrajetoIntermunicipal;

class CompraPassagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compra_passagem.main.index');
    }
}
