<?php

namespace App\Http\Requests;

use App\Utilities\ValidationUtils;

class InvitationRequest
{
    public function rules()
    {
        return [
            'username' => ['required', 'max:64'],
            'password' => ['required', 'max:64'],
            'invited_email' => ['required', 'email'],
            'role' => ['required', 'in:' . ValidationUtils::getRoles()],
            'api_access_period_days' => ['required', 'integer', 'min:1'],
            'motive' => ['required', 'max:1000']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => "O campo 'usuário' é obrigatório.",
            'username.max' => "O campo 'usuário' não pode ter mais de :max caracteres.",
            'password.required' => "O campo 'senha' é obrigatório.",
            'password.max' => "O campo 'senha' não pode ter mais de :max caracteres.",
            'invited_email.required' => "O campo 'e-mail convidado' é obrigatório.",
            'invited_email.email' => "Por favor, insira um endereço de e-mail válido.",
            'role.required' => "O campo 'função' é obrigatório.",
            'role.in' => "O valor selecionado para 'função' não é válido.",
            'api_access_period_days.required' => "O campo 'dias de acesso' é obrigatório.",
            'api_access_period_days.integer' => "O campo 'dias de acesso' deve ser um número inteiro.",
            'api_access_period_days.min' => "O campo 'dias de acesso' deve ser no mínimo :min.",
            'motive.required' => "O campo 'motivo' é obrigatório.",
            'motive.max' => "O campo 'motivo' não pode ter mais de :max caracteres."
        ];
    }
}
