<?php

namespace App\Http\Requests\PublicRequests;

class AuthRequest
{
    public function rules()
    {
        return [
            'username' => ['required', 'max:64'],
            'password' => ['required', 'max:64']
        ];
    }
}
