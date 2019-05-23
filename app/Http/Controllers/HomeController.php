<?php

namespace App\Http\Controllers;
use App\Cidade;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // // var_dump(Auth::user()); exit;
        // if(Auth::user()->tipo_usuario_id === 5){
        //     return redirect()
        //         ->route('venda_intermunicipal.index');
        // }

        $cidades = new Cidade();
        $lista = $cidades->getAll();
        return view('home.welcome', compact('lista'));
    }
}
