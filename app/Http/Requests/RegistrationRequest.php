<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class RegistrationRequest
{
    public function rules()
    {
        $strongPassword = Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();

        return [
            'name' => ['required', 'min:10', 'max:100'],
            'email' => ['required', 'email'],
            'invitation' => ['required', 'size:12'],
            'username' => ['required', 'min:8', 'max:24'],
            'password' => ['required', $strongPassword],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "O campo 'nome' é obrigatório.",
            'name.min' => "O campo 'nome' deve ter pelo menos :min caracteres.",
            'name.max' => "O campo 'nome' não pode ter mais de :max caracteres.",
            'email.required' => "O campo 'e-mail' é obrigatório.",
            'email.email' => "Por favor, insira um endereço de e-mail válido.",
            'invitation.required' => "O campo 'convite' é obrigatório.",
            'invitation.size' => "O campo 'convite' deve ter exatamente :size caracteres.",
            'username.required' => "O campo 'usuário' é obrigatório.",
            'username.min' => "O campo 'usuário' deve ter pelo menos :min caracteres.",
            'username.max' => "O campo 'usuário' não pode ter mais de :max caracteres.",
            'password.required' => "O campo 'senha' é obrigatório.",
            'password_confirmation.required' => "Por favor, confirme sua senha.",
            'password.same' => "As senhas não coincidem.",
        ];
    }
}
