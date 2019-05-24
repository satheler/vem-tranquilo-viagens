<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assento extends Model
{
    protected $table = 'assento';


    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $assento = $this->find($id);
        return $assento;
    }

    public function ocupado(int $id){
        $assento = $this->find($id);
        $assento->ocupado = true;
        $assento->save();
    }

    public function isOcupado(int $id){
        $assento = $this->find($id);
        return $assento->ocupado;
    }

    // public function add(array $input)
    // {
    //     $validator = Validator::make($input, [
    //         'valor' => 'required|string'
    //     ]);

    //     if ($validator->fails()) {
    //         return $validator;
    //     }

    //     $this->valor = $input['valor'];
    //     $this->categoria_id = $input['categoria_id'];

    //     $this->save();
    // }

    // public function edit(int $id, array $input)
    // {
    //     $assento = $this->find($id);
    //     $validator = Validator::make($input, [
    //         'valor' => 'required|string',
    //         'categoria_id' => 'exists:categoria_onibus,id'
    //     ]);
    //     if ($validator->fails()) {
    //         return $validator;
    //     }
    //     $assento->valor = $input['valor'];
    //     $assento->categoria_id = $input['categoria_id'];

    //     $assento->save();
    // }

    // public function remove(int $id)
    // {
    //     return $this->destroy($id);
    // }
}
