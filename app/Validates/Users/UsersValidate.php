<?php

namespace App\Validates\Users;

use App\Validates\Validate;

class UsersValidate extends Validate
{
    protected $rules = [
        'name' => 'required|max:200',
        'email' => 'required|email'
    ];

    protected $messages = [
        'name.required' => 'Campo Obrigatório!',
        'name.max' => 'O campo nome pode até no máximo 200 caracteres!',
        'email.required' => 'Campo Obrigatório'
    ];
}
