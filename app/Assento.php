<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Assento extends Model
{
    protected $table = 'assentos_vendidos';

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $num_assento, int $alocacao_id){
        return $this->where(['num_assento' => $num_assento, 'alocacao_id'=> $alocacao_id])->first();
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
        $this->num_assento = $input['num_assento'];
        $this->alocacao_id = $input['alocacao_id'];
        return $this->save();
    }

    public function addVenda($id)
    {
        $this->venda_id = $id;
        $this->update();

        return $this;
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
