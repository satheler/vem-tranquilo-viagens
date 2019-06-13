<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        $cidades = new Cidade();
        $lista = $cidades->getAll();
        return view('home.welcome', compact('lista'));
    }
}
