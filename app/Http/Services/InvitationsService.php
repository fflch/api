<?php

namespace App\Http\Services;

use App\Models\Invitation;
use Illuminate\Support\Carbon;
use App\Utilities\CommonUtils;
use Illuminate\Support\Facades\Hash;

class InvitationsService
{
    public function getInvitation($request)
    {
        $invitation = $this->invitationAlreadyExists($request);

        if (!$invitation) {
            $newInvitation = new Invitation();

            $invitation_token = CommonUtils::generateRandomToken(12);

            $newInvitation->invited_email = $request->invited_email;
            $newInvitation->invitation_token = Hash::make($invitation_token);
            $newInvitation->inviter_username = $request->username;
            $newInvitation->role =  $request->role;
            $newInvitation->api_access_period_days = $request->api_access_period_days;
            $newInvitation->token_was_used = 0;
            $newInvitation->invitation_expiration_date = date('Y-m-d H:i:s', strtotime('+30 days'));
            $newInvitation->motive = $request->motive;

            $newInvitation->save();

            $invitation = $newInvitation;
        }

        $expiration_date = date("d/m/Y", strtotime($invitation->invitation_expiration_date));

        return [
            'email_to_invite' => $invitation->invited_email,
            'invitation_token' => $invitation_token,
            'invitation_expiration_date' => $expiration_date,
            'api_access_period_days' => $invitation->api_access_period_days
        ];
    }

    public function invitationAlreadyExists($request)
    {
        $existingInv = Invitation::where('invited_email', $request->invited_email)
            ->where('invitation_expiration_date', '>', Carbon::now('GMT-3'))
            ->where('api_access_period_days', $request->api_access_period_days)
            ->where('invitation_expiration_date', '>', Carbon::now('GMT-3'))
            ->first();

        if ($existingInv) {
            $existingInv->invitation_expiration_date = date('Y-m-d H:i:s', strtotime('+30 days'));
            $existingInv->save();

            return $existingInv;
        }

        return null;
    }
}
