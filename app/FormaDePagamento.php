<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class FormaDePagamento extends Model
{
    protected $table = 'forma_de_pagamento';

    public function description()
    {
        return $this->morphTo();
    }

    public function getAll()
    {
        return $this::all();
    }

    public function get(int $id)
    {
        $item = $this->find($id);
        return $item;
    }


    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'forma' => 'required|string',
            'intermunicipal' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->forma = $input['forma'];
        $this->intermunicipal = $input['intermunicipal'];

        $this->save();
    }
    public function edit(int $id, array $input)
    {
        $pagamento = $this->find($id);
        $validator = Validator::make($input, [
            'forma' => 'required|string',
            'intermunicipal' => 'required|boolean',

        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }
        $pagamento->forma = $input['forma'];
        $pagamento->intermunicipal = $input['intermunicipal'];
        $pagamento->save();
    }
}
