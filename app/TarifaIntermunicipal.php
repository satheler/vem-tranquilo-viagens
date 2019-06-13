<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tarifa;

class TarifaIntermunicipal extends Model
{

    protected $table = 'tarifa_intermunicipal';

    public function description()
    {
        return $this->morphOne('App\Tarifa', 'description');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        return $this->find($id);
    }

    public function add(array $input) {
        $tarifa = new Tarifa();
        $tarifaAdd = $tarifa->add($input);

        if(($tarifaAdd instanceof \Illuminate\Validation\Validator)) {
            return $tarifaAdd;
        }

        $this->save();
        $this->description()->save($tarifaAdd);
    }


}
