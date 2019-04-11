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

    public function get($id)
    {
        return $this->find($id);
    }

    public function getAll()
    {
        return $this->where('inativo', true)->get();
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

        $data_fabricacao = new DateTime($input['data_fabricacao']);
        $data_fabricacao = $data_fabricacao->format('Y-d-m');
        $this->data_fabricacao = $data_fabricacao;

        $data_compra = new DateTime($input['data_compra']);
        $data_compra = $data_compra->format('Y-d-m');
        $this->data_compra = $data_compra;

        return $this;
    }
}
