<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class OnibusUrbano extends Model
{
    protected $table = 'onibus_urbano';

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
            'lotacao' => 'required|integer',
            'arCondicionado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->lotacao = $input['lotacao'];
        $this->arCondicionado = $input['arCondicionado'];

        $onibus = new Onibus();
        $data = $onibus->add($input);

        $this->save();
        $this->description()->save($data);
    }

}
