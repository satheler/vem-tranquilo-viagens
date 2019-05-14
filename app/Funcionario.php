<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;
use Exception;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    public function tipo() {
        return $this->hasOne('App\TipoFuncionario', 'id', 'tipo_id');
    }

    public function local() {
        return $this->hasOne('App\Rodoviaria', 'id', 'local_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function getByTipoId(int $tipo_id) {
        return $this->where('tipo_id', $tipo_id)->get();
    }

    public function getByLocalId(int $local_id) {
        return $this->where('local_id', $local_id)->get();
    }
    
    public function get(int $id){
        $funcionario = $this->find($id);
        return $funcionario;
    }

    public function add(array $input)
    {
        $validator = Validator::make($input, [
            'nome' => 'required|string',
            'tipo' => 'required|exists:tipos_funcionario,id',
            'local' => 'required|exists:rodoviarias,id',
            'status' => 'required|boolean',
            'observacao' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        //Funcionario::where('id', $id)->first();

        $this->nome = $input['nome'];
        $this->tipo_id = $input['tipo'];
        $this->local_id = $input['local'];
        $this->status = $input['status'];
        $this->observacao = $input['observacao'];

        $this->save();
    }

    public function edit(array $input, int $id)
    {

        $validator = $this->rules($input);
        if ($validator->fails()) {
            return $validator;
        }

        $funcionario = $this->find($id);

        $funcionario->nome = $input['nome'];
        $funcionario->tipo_id = $input['tipo'];
        $funcionario->local_id = $input['local'];
        $funcionario->status = $input['status'];
        $funcionario->observacao = $input['observacao'];

        $funcionario->update();
    }

    private function rules(array $input){
        return Validator::make($input, [
            'nome' => 'required|string',
            'tipo' => 'required|exists:tipos_funcionario,id',
            'local' => 'required|exists:rodoviarias,id',
            'status' => 'required|boolean',
            'observacao' => 'requi red|string',
        ]);
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
