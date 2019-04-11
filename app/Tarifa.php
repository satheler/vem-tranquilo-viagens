<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Validator;
use DateTime;

class Tarifa extends Model
{
    protected $table = 'tarifa';

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $tarifa = $this->find($id);
        return $tarifa;
    }

    public function add(array $input)
    {
        $dateToday = new DateTime();
        $validator = Validator::make($input, [
            'valor' => 'required|numeric|min:0.01',
            'data' => 'required|date_format:d/m/Y|after:'. $dateToday->format('d/m/Y')
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->valor = $input['valor'];

        $dataConverter = date_create_from_format('d/m/Y', $input['data']);
        $this->data = $dataConverter->format('Y-m-d');

        return $this;
    }
}
