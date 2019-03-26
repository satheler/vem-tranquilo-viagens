<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';

    public function description()
    {
        return $this->morphTo();
    }

    // protected function getAll()
    // {
    //     return $this::all();
    // }

    // public function add(array $request)
    // {
    //     $request->validate([
    //         'disponivel' => 'required|boolean',
    //         'acessibilidade' => 'required|boolean',
    //         'custoManutencao' => 'required|integer',
    //         'chassi' => 'required|min:17|max:17|unique:onibus',
    //         'placa' => 'required|min:7|max:7|unique:onibus',
    //     ]);

    //     $this->disponivel = $request->input('disponivel');
    //     $this->acessibilidade = $request->input('acessibilidade');
    //     $this->custoManutencao = $request->input('custoManutencao');
    //     $this->chassi = $request->input('chassi');
    //     $this->placa = $request->input('placa');

    //     $this->save();

    // }
}
