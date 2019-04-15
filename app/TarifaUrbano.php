<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;
use App\Tarifa;

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
            'cidade_id' => 'exists:cidades,id',
            'licitacao' => 'required|unique:tarifa_urbano',
            'valorEspecial' => 'required|numeric'
        ]);

        // var_dump($input);
        // exit;

        if ($validator->fails()) {
            return $validator;
        }

        $this->cidade_id = $input['cidade_id'];
        $this->licitacao = $input['licitacao'];
        $this->valor_especial = $input['valorEspecial'];

        $tarifa = new Tarifa();
        $tarifaAdd = $tarifa->add($input);

        if(($tarifaAdd instanceof \Illuminate\Validation\Validator)) {
            return $tarifaAdd;
        }

        $this->save();
        $this->description()->save($tarifaAdd);
    }
}
