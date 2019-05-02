<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Validator as Validator;
use DateTime;
use Exception;

class Onibus extends Model
{
    protected $table = 'onibus';

    public function description()
    {
        return $this->morphTo();
    }

    public function seguro()
    {
        return $this->hasMany('App\SeguroOnibus', 'id', 'onibus_id');
    }

    public function get($id)
    {
        return $this->find($id);
    }

    public function getAll()
    {
        return $this->all();
    }

    public function add(array $input)
    {
        $date = new DateTime();
        $validator = Validator::make($input, [
            'acessibilidade' => 'required|boolean',
            'chassi' => 'required|min:17|max:17|unique:onibus',
            'placa' => 'required|min:7|max:7|unique:onibus',
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'data_compra' => 'required|date_format:d/m/Y|before_or_equal:'. $date->format('d/m/Y'),
            'data_fabricacao' => 'required|date_format:d/m/Y|before_or_equal:'. $date->format('d/m/Y')
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->acessibilidade = $input['acessibilidade'];
        $this->chassi = $input['chassi'];
        $this->placa = $input['placa'];
        $this->modelo = $input['modelo'];
        $this->marca = $input['marca'];

        $data_fabricacaoConverter = date_create_from_format('d/m/Y', $input['data_fabricacao']);
        $this->data_fabricacao = $data_fabricacao->format('Y-m-d');

        $data_compraConverter = date_create_from_format('d/m/Y', $input['data_compra']);
        $this->data_compra = $data_compraConverter->format('Y-m-d');

        return $this;
    }
}
