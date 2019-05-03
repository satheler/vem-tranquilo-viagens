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
    
    public function cidade() {
        return $this->hasOne('App\Cidade', 'id', 'cidade_id');
    }

    public function local() {
        return $this->hasOne('App\Rodoviaria', 'id', 'local_id');
    }

    public function getAll()
    {
        return $this->all();
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
            'cidade' => 'required|exists:cidades,id'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        //Funcionario::where('id', $id)->first();

        $this->nome = $input['nome'];
        $this->tipo_id = $input['tipo'];
        $this->local_id = $input['local'];
        $this->cidade_id = $input['cidade'];

        $this->save();
    }

    public function edit(int $id, array $input)
    {
        $funcionario = $this->find($id);

        $validator = Validator::make($input, [
            'nome' => 'required|string',
            'tipo' => 'required|exists:tipos_funcionario,id',
            'local' => 'required|exists:rodoviarias,id',
            'cidade' => 'required|exists:cidades,id'

        ]);
        if ($validator->fails()) {
            return $validator;
        }
        $funcionario->nome = $input['nome'];
        $funcionario->tipo = $input['tipo_id'];
        $funcionario->local = $input['local_id'];
        $funcionario->cidade = $input['cidade_id'];

        $funcionario->save();
    }

    public function remove(int $id)
    {
        return $this->destroy($id);
    }
}
