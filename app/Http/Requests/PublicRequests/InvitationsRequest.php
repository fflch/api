<?php

namespace App\Http\Requests\PublicRequests;

use App\Utilities\ValidationUtils;

class InvitationsRequest
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
}
