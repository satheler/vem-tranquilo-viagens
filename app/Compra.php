<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\VendaOnline;
use App\Cliente;
use Exception;

use Auth;

class Compra extends Model
{
    protected $table = 'compras';

    public function venda()
    {
        return $this->belongsToMany('App\VendaOnline', 'compras', 'cliente_id', 'venda_id');
    }

    public function cliente()
    {
        return $this->belongsToMany('App\Cliente', 'compras', 'venda_id', 'cliente_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function add(array $input)
    {
        
        $cliente = new Cliente();
        $cliente = $cliente->where(['user_id' => Auth::user()->id])->first();
        $this->cliente_id = $cliente->id;

        $venda = new VendaOnline();
        $venda->add($input);
        $this->venda_id = $venda->id;
        
        if ($input['usarPontos'] == 'on') {
            
            $cliente->pontuar($venda);
        }

        $this->save();
    }

}
