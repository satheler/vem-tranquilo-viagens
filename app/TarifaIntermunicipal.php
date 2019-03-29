<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class TarifaIntermunicipal extends Model
{
    protected $table= 'tarifa_intermunicipal';

    public function description()
    {
        return $this->morphOne('App\Tarifa', 'description');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
    $tarifa = new Tarifa();
    $data = $tarifa->add($input);

    $this->save();
    $this->description()->save($data);
    }
}
