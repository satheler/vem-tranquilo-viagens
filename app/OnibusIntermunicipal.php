<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Validator;

class OnibusIntermunicipal extends Model
{
    protected $table = 'onibus_intermunicipal';

    public function assento()
    {
        return $this->hasMany('App\AssentoOnibus',  'onibus_id', 'id');
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
            'assento_id' => 'exists:assento_id,id',
            'banheiro' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->assento_id = $input['assento_id'];
        $this->banheiro = $input['banheiro'];

        $onibus = new Onibus();
        $data = $onibus->add($input);

        $this->save();
        $this->description()->save($data);
    }

    public function edit(int $id)
    {
        $onibus = $this->find($id);
        $description = $onibus->description;
        $description->disponivel = !$description->disponivel;

        $onibus->save();
        $onibus->description()->save($description);
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
