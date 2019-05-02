<?php

namespace App;

use Validator;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguro';

    public function tipo() {
        return $this->hasOne('App\TipoSeguro', 'id', 'tipo_id');
    }

    public function onibus() {
        return $this->belongsToMany('App\Onibus', 'seguro_onibus', 'seguro_id', 'onibus_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        $seguro = $this->find($id);
        return $seguro;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'empresa' => 'required|string',
            'valor' => 'required|numeric|min:0.01',
            'assegura' => 'required|string',
            'data_vigencia' => 'required|date_format:d/m/Y|after:'. now()->format('d/m/Y'),
            'data_inicio' => 'required|date_format:d/m/Y|before:data_vigencia',
            'tipo_id' => 'required|exists:tipo_seguro,id',
            'onibus' => 'required|array'

        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $this->empresa = $input['empresa'];
        $this->tipo_id = $input['tipo_id'];
        $this->valor = $input['valor'];
        $this->assegura = $input['assegura'];

        $dataConverterInicio = date_create_from_format('d/m/Y', $input['data_inicio']);
        $this->data_inicio = now()->format('Y-m-d');

        $dataConverter = date_create_from_format('d/m/Y', $input['data_vigencia']);
        $this->data_vigencia = $dataConverter->format('Y-m-d');

        $this->vigente = true;

        $this->save();
        $this->onibus()->attach($input['onibus']);
    }

    public function edit(int $id, array $input)
    {
        $seguro = $this->find($id);

        $dateToday = new DateTime();

        $validator = Validator::make($input, [
            'empresa' => 'required|string',
            'valor' => 'required|numeric|min:0.01',
            'data_vigencia' => 'required|date_format:d/m/Y|after:'. now()->format('d/m/Y'),
            'data_inicio' => 'required|date_format:d/m/Y|before:data_vigencia',
            'assegura' => 'required|string',
            'tipo_id' => 'required|exists:tipo_seguro,id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $seguro->empresa = $input['empresa'];
        $seguro->valor = $input['valor'];
        $seguro->assegura = $input['assegura'];
        $seguro->tipo_id = $input['tipo_id'];

        $dataConverterInicio = date_create_from_format('d/m/Y', $input['data_inicio']);
        $this->data_inicio = $dataConverterInicio->format('Y-m-d');

        $dataConverter = date_create_from_format('d/m/Y', $input['data_vigencia']);
        $this->data_vigencia = $dataConverter->format('Y-m-d');

        $this->vigente = true;

        $seguro->save();

    }
    public function disable(int $id)
    {

        if($this->data_vigencia == now()){
            $this->vigente = false;
        }

        $this->save();

        return $this;
    }

}
