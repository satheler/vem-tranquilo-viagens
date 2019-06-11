<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\VendaOnline;
use App\Cliente;

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
        $this->cliente_id = Auth::user()->id;
        $venda = new VendaOnline();
        $venda->add($input);

        $this->venda_id = $venda->id;

        $cliente = new Cliente();
        $cliente = $cliente->get(Auth::user()->id);
        $cliente->pontuar($venda);

        $this->save();
    }

}
