<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Exception;

class CadastroClienteController extends Controller
{


    public function index() {
        return view('cadastro.index');
    }

    public function store(Request $request) {
        $cliente = new Cliente();
        $validator = $cliente->add($request->input());

        if($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()
                ->route('page_cadastro.index')
                ->withErrors($validator)
                ->withInput();
        } else {

            // JÁ CRIAR UMA SESSÃO PARA O USUÁRIO

            return redirect()->route('page_home.index');
        }
    }
}
