<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
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

        return $assento;
    }

    public function isOcupado(int $id){
        $assento = $this->find($id);
        return $assento->ocupado;
    }

    public function add($input)
    {

        // $validator = Validator::make($input, [
        //     'num_assento' => 'required|numeric|min:1||max:42'
        // ]);

        // if ($validator->fails()) {
        //     return $validator;
        // }

        $this->num_assento = $input;
        $this->ocupado = true;

        $this->save();

        return $this->id;
    }

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
