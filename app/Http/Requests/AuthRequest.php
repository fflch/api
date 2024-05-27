<?php

namespace App\Http\Requests;

class AuthRequest
{
    public function rules()
    {
        return [
            'username' => ['required', 'max:64'],
            'password' => ['required', 'max:64']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => "O campo 'usuário' é obrigatório.",
            'username.max' => "O campo 'usuário' não pode ter mais de :max caracteres.",
            'password.required' => "O campo 'senha' é obrigatório.",
            'password.max' => "O campo 'senha' não pode ter mais de :max caracteres."
        ];
    }
}
