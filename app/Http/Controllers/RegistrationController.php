<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RegistrationService;
use App\Http\Requests\RegistrationRequest;
use App\Utilities\ErrorUtils;
use Illuminate\Support\Carbon;

class RegistrationController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new RegistrationService();
    }

    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validationClass = new RegistrationRequest;

        $validator = validator(
            $request->all(),
            $validationClass->rules(),
            $validationClass->messages()
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check invitation info
        $invitee = $this->service->findInvitee($request);

        if (!$invitee) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    ErrorUtils::registrationCredentials
                )
                ->withInput();
        }

        // Check if invitation has expired or was already used
        $invitationValidity = $invitee->invitation_expiration_date;
        $currentTimestamp = Carbon::now('GMT-3');
        $wasUsed = $invitee->token_was_used;

        if ($currentTimestamp > $invitationValidity || $wasUsed === 1) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    ErrorUtils::invalidatedInvitation
                )
                ->withInput();
        }

        // Check if username is already in use
        if ($this->service->usernameInvalid($request->username)) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    ErrorUtils::usernameInUse
                )
                ->withInput();
        }

        // Create user account
        $newUser = $this->service->createUserAccount($request, $invitee);

        // Invalidate invitation token (as it was already used)
        $this->service->invalidateInvitationToken($invitee->id);

        // Generate first user's api token
        $token = $newUser->createToken('first-token');

        $deactivation_date = date("d/m/Y \à\s H\hm", strtotime($newUser->deactivation_date));

        $tokenParts = explode('|', $token->plainTextToken);
        $cleanPlainTextToken = end($tokenParts);

        return view(
            'account_created',
            ['info' => [$cleanPlainTextToken, $deactivation_date]]
        );
    }
}
