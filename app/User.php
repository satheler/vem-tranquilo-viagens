<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SeguroFuncionario;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    public function seguro()
    {
        return $this->belongsToMany('App\SeguroFuncionario', 'seguro_funcionario_relacionamento', 'funcionario_id', 'seguro_id');
    }

    public function tipo()
    {
        return $this->hasOne('App\TipoFuncionario', 'id', 'tipo_usuario_id');
    }

    public function getAll()
    {
        return $this->all();
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rodoviaria() {
        return $this->hasOne('App\Rodoviaria', 'id', 'rodoviaria_id');
    }
}
