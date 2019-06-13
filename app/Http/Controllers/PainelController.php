<?php

namespace App\Http\Controllers;
use Auth;

class PainelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // var_dump(Auth::user()); exit;
        if(Auth::user()->tipo_usuario_id === 5){
            return redirect()
                ->route('vendapassagem.index');
        }

        return view('dashboard');
    }
}
