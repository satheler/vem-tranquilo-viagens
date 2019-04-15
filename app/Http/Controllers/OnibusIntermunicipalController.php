<?php

namespace App\Http\Controllers;

use App\OnibusIntermunicipal;
use Exception;
use Illuminate\Http\Request;
use App\CategoriaOnibus;

class OnibusIntermunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onibus = new OnibusIntermunicipal();
        $lista = $onibus->getAll();
        return view('frotas.intermunicipal.index', compact('lista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasOnibus = new CategoriaOnibus();
        $lista = $categoriasOnibus->getAll();
        return view('frotas.intermunicipal.create', compact('lista'));
        // return "Formulário cadastro";
        //return view('cadastroOnibusIntermunicipal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $onibus = new OnibusIntermunicipal();
        $validator = $onibus->add($request->input());

        if($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()->route('onibus_intermunicipal.index')->withStatus(__('Ônibus intermunicipal adicionado com sucesso.'));
        } else {
            return redirect()
                    ->route('onibus_intermunicipal.create')
                    ->withErrors($validator)
                    ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $onibus = new OnibusIntermunicipal();
        $item = $onibus->get($id);
        return view('frotas.intermunicipal.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onibus = new OnibusIntermunicipal();
        $listadeOnibus = $onibus->getAll();
        $onibuseditado = $listadeOnibus[$id];
        return "Formulario de edição para o" . $onibuseditado->toJson();

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
        try {

            $onibuseditado = new OnibusIntermunicipal();
            $onibuseditado->edit($id);
            return response(["status" => "Ônibus atualizado com sucesso"], 202);

        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $onibus = new OnibusIntermunicipal();
        return $onibus->disable($id, $request->input());
        // return "true";
        return response(['error' => 'Função não permitida.'], 501);
    }
}
