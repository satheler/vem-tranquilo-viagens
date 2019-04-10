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
        return $this->all();
    }

    public function get(int $id){
        $tarifa = $this->find($id);
        return $tarifa;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'valor' => 'required|double',
            'data' => 'after:date'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->valor = $input['valor'];
        $this->data = $input['data'];

        return $this;
    }
}
