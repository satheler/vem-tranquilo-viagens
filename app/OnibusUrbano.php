<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use \Validator as Validator;

class OnibusUrbano extends Model
{
    protected $table = 'onibus_urbano';

    public function description()
    {
        return $this->morphOne('App\Onibus', 'description');
    }

    public function frota() {
        return $this->hasOne('App\Frota', 'id', 'frota_id');
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

    public function getFrota(int $id)
    {

        $frota = $this->where('frota_id', $id)->get();

        foreach($frota as $bus => $onibus)
        {
            $bus = $this->get($onibus->id);
        }

        return $bus;
    }



    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'lotacao' => 'required|integer',
            'arCondicionado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->lotacao = $input['lotacao'];
        $this->arCondicionado = $input['arCondicionado'];

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
