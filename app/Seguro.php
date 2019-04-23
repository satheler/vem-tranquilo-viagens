<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguro';

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $seguro = $this->find($id);
        return $seguro;
    }



    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'empresa' => 'required|string',
            'valor' => 'required|integer',
            'assegura' => 'required|string',
            'tipo_id' => 'required|exists:tipos_seguro,id'//enum dos tipos de seguro

        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->empresa = $input['empresa'];
        $this->tipo_id = $input['tipo_id'];
        $this->valor = $input['valor'];
        $this->assegura = $input['assegura'];

        $this->save();
    }

}
