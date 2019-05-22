<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use \Validator as Validator;
use App\RegistroManutencao;

class OnibusIntermunicipal extends Model
{
    protected $table = 'onibus_intermunicipal';

    public function manutencoes(){
        return $this->hasMany('App\RegistroManutencao', 'onibus_id', 'id');
    }

    public function categoria() {
        return $this->hasOne('App\CategoriaOnibus', 'id', 'categoria_id');
    }

    public function description()
    {
        return $this->morphOne('App\Onibus', 'description');
    }

    public function getAll()
    {
        return $this->whereHas('description', function ($query) {
            $query->where('inativo', false);
        })->get();
    }

    public function get(int $id)
    {
        $onibus = $this->find($id);
        $onibus->description;
        return $onibus;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'banheiro' => 'required|boolean',
            'categoria_id' => 'exists:categoria_onibus,id',
            'qnt_assento' => 'required|numeric|min:26||max:42'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->banheiro = $input['banheiro'];
        $this->qnt_assento = $input['qnt_assento'];
        $this->categoria_id= $input["categoria_id"];

        $onibus = new Onibus();
        $onibusAdd = $onibus->add($input);

        if(($onibusAdd instanceof \Illuminate\Validation\Validator)) {
            return $onibusAdd;
        }

        $this->save();
        $this->description()->save($onibusAdd);
    }

    public function edit(int $id)
    {
        $onibus = $this->find($id);
        $description = $onibus->description;
        $description->disponivel = true;

        $onibus->description()->save($description);
        $onibus->save();
    }

    public function manutencao(array $input, int $id)
    {
        $validator = Validator::make($input, [
            'motivo' => 'required|string',
            'valor' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $onibus = $this->find($id);
        $description = $onibus->description;
        $description->disponivel = false;

        $registro = new RegistroManutencao();
        $registro->motivo = $input['motivo'];
        $registro->valor = $input['valor'];

        $onibus->manutencoes()->save($registro);
        $onibus->description()->save($description);
        $onibus->save();
    }

    public function disable(int $id, array $input)
    {
        $onibus = $this->find($id);
        $validator = Validator::make($input, [
            'observacao'=> 'required|string',
        ]);

        if ($validator->fails()) {
           return $validator;
        }

        $description = $onibus->description;
        $description->inativo = true;
        $description->observacao = $input['observacao'];

        $onibus->save();
        $onibus->description()->save($description);

        return $this;
    }
}
