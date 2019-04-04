<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class TarifaLocal extends Model
{
    protected $table= 'tarifa_local';

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

        $validator = Validator::make($input, [
            'cidade' => 'exists:cidade,cidade', //Verifica se a cidade existe na tabela cidade e coluna cidade.
            'licitacao' => 'required|unique:tarifa',
            'valorEspecial' => 'required|integer'

        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        $this->cidade = $input['cidade'];
        $this->licitacao = $input['licitacao'];
        $this->valorEspecial = $input['valor_especial'];

        $tarifa = new Tarifa();
        $data = $tarifa->add($input);

        $this->save();
        $this->description()->save($data);
    }
}
