<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Validator;

class Tarifa extends Model
{
    protected $table = 'tarifa';

    public function description()
    {
        return $this->morphTo();
    }

    protected function getAll()
    {
        return $this::all();
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'valor' => 'required|double',
            'data' => 'required|date'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->valor = $input['valor'];
        $this->data = $input['data'];

        return $this;
    }
}
