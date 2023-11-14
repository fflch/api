<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthService
{
    public function generateNewApiToken(User $user)
    {
        $this->nullifyEveryOtherApiTokenFromUser($user->id);

        // $user->tokens()->delete();

        $token = $user->createToken('new-token');

        return $token->plainTextToken;
    }

    private function nullifyEveryOtherApiTokenFromUser($user_id)
    {
        return DB::table('personal_access_tokens')
            ->where('tokenable_id', $user_id)
            ->where('tokenable_type', 'App\Models\User')
            ->update([
                'revoked' => 1
            ]);
    }
}