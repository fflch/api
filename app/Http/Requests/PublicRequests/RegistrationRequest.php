<?php

namespace App\Http\Requests\PublicRequests;

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
}
