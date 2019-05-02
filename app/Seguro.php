<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguro';

    public function tipo() {
        return $this->hasOne('App\TipoSeguro', 'id', 'tipo_id');
    }

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
            'valor' => 'required|numeric|min:0.01',
            'assegura' => 'required|string',
            'tipo_id' => 'required|exists:tipo_seguro,id'//enum dos tipos de seguro

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
