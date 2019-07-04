<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tarifa;
use App\CategoriaOnibus;

class TarifaIntermunicipal extends Model
{

    protected $table = 'tarifa_intermunicipal';

    public function description()
    {
        return $this->morphOne('App\Tarifa', 'description');
    }

    public function categoria()
    {
        return $this->hasOne('App\CategoriaOnibus', 'id', 'categoria_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        return $this->find($id);
    }

    public function add($request) {
        $tarifa = new Tarifa();
        $tarifaAdd = $tarifa->add($request->input());

        if(($tarifaAdd instanceof \Illuminate\Validation\Validator)) {
            return $tarifaAdd;
        }
        $categoria = 1; 
       //$categoria = $request["categoria_id"];
        $this->categoria_id = $categoria;
        $this->save();
        $this->description()->save($tarifaAdd);
    }


}
