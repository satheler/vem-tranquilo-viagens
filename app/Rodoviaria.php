<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Rodoviaria extends Model
{
    protected $table = 'rodoviarias';

    public function cidade()
    {
        return $this->hasOne('App\Cidade', 'id', 'cidade_id');
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function getAll(bool $ativo = true)
    {
        return $this->where('ativa', $ativo)->get();
    }

    public function add(array $input)
    {
        $validator = $this->rules($input);
        if ($validator->fails()) {
            return $validator;
        }

        $this->logradouro = $input["logradouro"];
        $this->numero = $input["numero"];
        $this->bairro = $input["bairro"];

        $this->cidade_id = $input["cidade"];
        $this->cep = preg_replace('/[^0-9]/', '', $input["cep"]);
        $this->telefone = preg_replace('/[^0-9]/', '', $input["telefone"]);

        $this->save();
    }

    public function edit(array $input, int $id)
    {
        $validator = $this->rules($input);
        if ($validator->fails()) {
            return $validator;
        }

        $rodoviaria = $this->find($id);

        $rodoviaria->logradouro = $input["logradouro"];
        $rodoviaria->numero = $input["numero"];
        $rodoviaria->bairro = $input["bairro"];

        $rodoviaria->cidade_id = $input["cidade"];
        $rodoviaria->cep = preg_replace('/[^0-9]/', '', $input["cep"]);
        $rodoviaria->telefone = preg_replace('/[^0-9]/', '', $input["telefone"]);

        $rodoviaria->update();
    }

    public function inactive(int $id)
    {
        $rodoviaria = $this->find($id);
        $rodoviaria->ativa = !$rodoviaria->ativa;
        $rodoviaria->update();
    }

    private function rules(array $input)
    {
        return Validator::make($input, [
            'logradouro' => 'required|string',
            'numero' => 'required|numeric',
            'bairro' => 'required|string',
            'cidade' => 'required|numeric|exists:cidades,id',
            'cep' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $onlyNumbers = preg_replace('/[^0-9]/', '', $value);

                    if (strlen($onlyNumbers) != 8) {
                        $fail("CEP informado inválido");
                    }
                },
                'min:8',
            ],
            'telefone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $onlyNumbers = preg_replace('/[^0-9]/', '', $value);

                    if (strlen($onlyNumbers) != 10) {
                        $fail("Telefone informado inválido");
                    }
                },
                'min:10'],
        ]);
    }
}
