<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;
use Validator;

class TrajetoIntermunicipal extends Model
{
    protected $table = 'trajeto_intermunicipal';

    public function trecho()
    {
        return $this->hasMany('App\TrechoTrajeto',  'trajeto_id', 'id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $trajeto = $this->find($id);
        return $trajeto;
    }

    public function add(array $input)
    {
        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $trajeto = $this->find($id);

        $validator = Validator::make($input, [
            'listaDeTrechos' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $trajeto->listaDeTrechos = $input['listaDeTrechos'];

        $trajeto->save();
    }

    public function remove(int $id)
    {
        //
    }

}
