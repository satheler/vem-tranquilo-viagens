<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    protected $table = 'passageiro';

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this::all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'tipo' => 'required|string',
            'desconto' => 'required|integer'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->tipo = $input['tipo'];
        $this->desconto = $input['desconto'];

        $this->save();
    }

    public function edit(int $id, array $input)
    {
        $passageiro = $this->find($id);
        $validator = Validator::make($input, [
            'tipo' => 'required|string',
            'desconto' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }
        $passageiro->tipo = $input['tipo'];
        $passageiro->desconto = $input['desconto'];

        $passageiro->save();
    }

    //public function destroy(int $id){

        //$this::destroy($id);



    //  OUTRA FORMA DE DELETAR O OBJETO
        //$passageiro = $this->find($id);
        //$passageiro->delete();

   // }
}
