<?php

namespace App\Http\Services;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function findInvitee($request)
    {
        $invitation = Invitation::query()
            ->where('invited_email', $request->email)
            ->orderBy('id', 'desc')
            ->first();

        if ($invitation && Hash::check($request->invitation, $invitation->invitation_token)) {
            return $invitation;
        }

        return null;
    }

    public function createUserAccount($request, $invitee)
    {
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->invitation_token = $invitee->invitation_token;
        $newUser->email = $request->email;
        $newUser->username = $request->username;
        $newUser->password = Hash::make($request->password);
        $newUser->role = $invitee->role;
        $newUser->deactivation_date =  Carbon::now('GMT-3')->addDays($invitee->api_access_period_days);

        $newUser->save();

        return $newUser;
    }

    public function invalidateInvitationToken($invitee_id)
    {
        return Invitation::query()
            ->where('id', $invitee_id)
            ->update([
                'token_was_used' => 1,
                'date_token_was_used' => Carbon::now('GMT-3')
            ]);
    }

    public function usernameInvalid($username)
    {
        return User::where('username', $username)->exists();
    }
}