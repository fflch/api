<?php

namespace App\Utilities;

class ErrorUtils
{
    const invitationPermission =
    "Sorry, it looks like you do not have " .
        "permission to create an invitation.";

    const invitationCredentials =
    "Invalid credentials";

    const registrationCredentials =
    "Invalid credentials. Please check your " .
        "email and invitation token and try again.";

    const invalidatedInvitation =
    "Sorry, your invitation token has expired or " .
        "was already used to create an account. " .
        "Please reach out to our IT department.";

    const usernameInUse =
    "Username already exists. Please choose a different one.";

    const authCredentials =
    "Invalid credentials. Check your email " .
        "and password and try again.";

    public static function deactivatedUser($user_validity)
    {
        return "Your account was deactivated on $user_validity, " .
            "resulting in the loss of access to our API. " .
            "Feel free to contact our IT department if you " .
            "need to request renewed access";
    }
}
