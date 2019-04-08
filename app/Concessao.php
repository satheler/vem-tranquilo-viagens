<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concessao extends Model
{
    protected $table = 'concessao';

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'numero_protocolo' => 'required|integer',
            'anexo'=> 'required|file',
            'data'=>'required|date'
        ]);


        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->numero_protocolo = $input['numero_protocolo'];
        $this->anexo = $input['anexo'];
        $this->data = $input['data'];

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $trecho = $this->find($id);

        $validator = Validator::make($input, [
            'numero_protocolo' => 'required|integer',
            'anexo' => 'required|file',
            'data' => 'required|date'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $trecho->numero_protocolo = $input['numero_protocolo'];
        $trecho->anexo = $input['anexo'];
        $trecho->data = $input['data'];

        $trecho->save();
    }

}
