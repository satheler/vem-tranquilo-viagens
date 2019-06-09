<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index() {
        return view('auth.cliente_login');
    }
}
