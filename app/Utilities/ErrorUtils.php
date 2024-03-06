<?php

namespace App\Utilities;

class ErrorUtils
{
    const invitationPermission =
    "Desculpe, parece que você não tem" .
        "permissão para criar um convite.";

    const invitationCredentials =
    "Credenciais inválidas";

    const registrationCredentials =
    "Credenciais inválidas. Por favor, verifique seu " .
        "e-mail e token de convite e tente novamente.";

    const invalidatedInvitation =
    "Desculpe, seu convite expirou ou " .
        "já foi utilizado para criar uma conta. " .
        "Por favor, entre em contato com " .
        "nosso departamento de TI.";

    const usernameInUse =
    "Nome de usuário já existe. Por favor, escolha outro.";

    const authCredentials =
    "Credenciais inválidas. Verifique seu e-mail " .
        "e senha e tente novamente.";

    public static function deactivatedUser($user_validity)
    {
        return "Sua conta foi desativada em $user_validity, " .
            "resultando na perda de acesso à nossa API. " .
            "Caso precise solicitar novo acesso, entre em contato " .
            "com nosso departamento de TI.";
    }
}
