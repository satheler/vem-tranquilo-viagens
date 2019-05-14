<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistroManutencao;
use App\OnibusUrbano;
use Exception;

class RegistroManutencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registro = new RegistroManutencao();
        $lista = $registro->getAll();
        return view('registro.main.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $registro = new RegistroManutencao();
        // $lista = $registro->getAll();
        // return view('registro.main.create', compact('lista'));
        return view('registro.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new RegistroManutencao();
        $validator = $registro->add($request->input());

        if($validator instanceof \Illuminate\Validation\Validator) {
            return redirect()->route('registro.main.index')->withStatus(__('Registro de manutenção feito com sucesso.'));
        } else {
            return redirect()
                    ->route('registro.main.create')
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
        $registro = new RegistroManutencao();
        $idRegistro = $registro->getId($id);
        $item = $registro->get($idRegistro->id);
        return view('manutencoes.main.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = new RegistroManutencao();
        $listadeRegistro = $registro->getAll();
        $registroEditado = $listadeRegistro[$id];
        return "Formulario de edição para o" . $registroEditado->toJson();
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

            $registroEditado = new RegistroManutencao();
            $registroEditado->edit($id);
            return response(["status" => "Registro de Manutenção atualizado com sucesso"], 202);

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
    public function destroy($id)
    {
        $registro = new RegistroManutencao();
        return $registro->disable($id, $request->input());
    }
}
