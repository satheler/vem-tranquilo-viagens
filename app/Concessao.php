<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concessao extends Model
{
    protected $table = 'concessao';

    public function get(int $id){
        $concessao = $this->find($id);
        return $concessao;
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
            return $validator;
        }

        $this->numero_protocolo = $input['numero_protocolo'];
        $this->anexo = $input['anexo'];
        $this->data = $input['data'];

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $concessao = $this->find($id);

        $validator = Validator::make($input, [
            'numero_protocolo' => 'required|integer',
            'anexo' => 'required|file',
            'data' => 'required|date'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $concessao->numero_protocolo = $input['numero_protocolo'];
        $concessao->anexo = $input['anexo'];
        $concessao->data = $input['data'];

        $concessao->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
