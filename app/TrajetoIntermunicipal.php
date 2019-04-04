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
        return $this->belongsToMany('App\Trecho', 'trajeto_trecho');
    }

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'listaDeTrechos' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->listaDeTrechos = $input['listaDeTrechos'];

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

    // public function destroy(int $id){

    //     $this->destroy($id);
    //     //return response();
    // }

}
