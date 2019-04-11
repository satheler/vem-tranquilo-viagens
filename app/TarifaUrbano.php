<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class TarifaUrbano extends Model
{
    protected $table= 'tarifa_urbano';

    public function cidade() {
        return $this->hasOne('App\Cidade', 'id', 'cidade_id');
    }

    public function description()
    {
        return $this->morphOne('App\Tarifa', 'description');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $tarifa = $this->find($id);
        return $trarifa;
    }

    public function add(array $input)
    {

        $validator = Validator::make($input, [
            'cidade_id' => 'exists:cidades,id', //Verifica se a cidade existe na tabela cidade e coluna cidade.
            'licitacao' => 'required|unique:tarifa_urbano',
            'valorEspecial' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->cidade_id = $input['cidade_id'];
        $this->licitacao = $input['licitacao'];
        $this->valor_especial = $input['valorEspecial'];

        $tarifa = new Tarifa();
        $tarifaAdd = $tarifa->add($input);

        $this->save();
        // $this->description()->save($tarifaAdd);
    }
}
