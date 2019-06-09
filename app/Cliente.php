<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use \Validator as Validator;

class Cliente extends Model
{
    protected $table = 'clientes';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function get(int $id)
    {
        return $this->find($id);
    }

    public function add(array $input)
    {
        $input['cpf'] = preg_replace('/[^0-9]/', '', $input['cpf']);

        $messagesCustom = ['nome.regex' => 'Formato inválido. Informe nome e sobrenome. Ex: João Silva'];

        $validator = Validator::make($input, [
            'nome' => [
                'required',
                'string',
                'max:255',
                "regex:/([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/",
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'cpf' => [
                'required',
                'string',
                'min:11',
                'max:11',
                'unique:clientes',
                function ($attribute, $value, $fail) {
                    if (!$this->validateCPF($value)) {
                        $fail('O CPF informado é inválido.');
                    }
                },
            ],
            'senha' => [
                'required',
                'confirmed',
            ],
        ], $messagesCustom);

        if ($validator->fails()) {
            return $validator;
        }

        $user = new User([
            'name' => strtoupper($input['nome']),
            'email' => $input['email'],
            'password' => Hash::make($input['senha']),
            'type' => 'cliente',
        ]);

        $this->cpf = $input['cpf'];

        $this->user()->create([
            'name' => strtoupper($input['nome']),
            'email' => $input['email'],
            'password' => Hash::make($input['senha']),
            'type' => 'cliente',
        ]);

        $userAdded = User::where('email', $input['email'])->first();
        $this->user_id = $userAdded->id;
        $this->save();
    }

    public function validateCPF($cpf)
    {
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

}
