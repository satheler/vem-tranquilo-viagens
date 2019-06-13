<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CadastroClienteController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('cadastro.index');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $validator = $cliente->add($request->input());

        if ($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()
                ->route('page_cadastro.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            event(new Registered($validator));
            $this->guard()->login($validator);

            return $this->registered($request, $validator)
            ?: redirect($this->redirectPath());
        }
    }
}
