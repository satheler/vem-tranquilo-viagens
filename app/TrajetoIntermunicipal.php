<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Exception;
use Validator;

class TrajetoIntermunicipal extends Model
{
    protected $table = 'trajeto_intermunicipal';

    public function trechos()
    {
        return $this->belongsToMany('App\Trecho', 'trajeto_trecho', 'trajeto_id', 'trecho_id');
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
        $validator = Validator::make($input, [
            'trechos' => 'required|array',
        ]);

        $this->save();
        $this->trechos()->attach($input['trechos']);
    }


    public function remove(int $id)
    {
        //
    }

}
