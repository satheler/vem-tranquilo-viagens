<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Assento;

class PassagemIntermunicipal extends Model
{
    protected $table = 'passagens_intermunicipal';

    public function getAll() {
        return $this->all();
    }

    public function get(int $id) {
        return $this->find($id);
    }

    public function add(array $input){
        
        $this->valor = $input['valor'];
        $this->users_id = Auth::user()->id;
        $this->alocacao_id = $input['alocacao_intermunicipal_id'];
        
        foreach ($input['poltronas'] as $poltrona) {
            $assento = new Assento();
            $assento->add(['num_assento' => $poltrona, 'alocacao_id' => $input['alocacao_intermunicipal_id']]);
        }

        $this->save();
        $assento->addVenda($this->id);
            
    }
}
