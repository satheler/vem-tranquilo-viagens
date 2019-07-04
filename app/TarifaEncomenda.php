<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tarifa;

class TarifaEncomenda extends Model
{

    protected $table = 'tarifa_encomenda';

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id){
        return $this->find($id);
    }

    public function add(array $input) {
        
        $this->valor = $input['valor'];
        $dataConverter = date_create_from_format('d/m/Y', $input['data']);
        $this->data = $dataConverter->format('Y-m-d');

        $this->save();
    }


}
