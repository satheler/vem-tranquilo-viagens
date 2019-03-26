<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class OnibusIntermunicipal extends Model
{
    protected $table = 'onibus_intermunicipal';

    public function description()
    {
        return $this->morphOne('App\Onibus', 'description');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'banheiro' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->banheiro = $input['banheiro'];

        $onibus = new Onibus();
        $data = $onibus->add($input);

        $this->save();
        $this->description()->save($data);
    }
}
