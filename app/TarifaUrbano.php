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
            'cidade_id' => 'exists:cidade,id', //Verifica se a cidade existe na tabela cidade e coluna cidade.
            'licitacao' => 'required|unique:tarifa',
            'valorEspecial' => 'required|integer'

        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->cidade = $input['cidade_id'];
        $this->licitacao = $input['licitacao'];
        $this->valorEspecial = $input['valor_especial'];

        $tarifa = new Tarifa();
        $data = $tarifa->add($input);

        $this->save();
        $this->description()->save($data);
    }
}
