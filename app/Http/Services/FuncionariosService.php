<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Utilities\WarningUtils;
use App\Http\Repositories\FuncionariosRepository;
use App\Utilities\RestrictedColumns\RestrictedFuncionarios;

class FuncionariosService
{
    protected $warning;

    public function __construct()
    {
        $this->warning = WarningUtils::vinculos;
    }

    public function publicGetFuncionarios(Array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            FuncionariosRepository::class,
            RestrictedFuncionarios::publicAccess,
            $this->warning
        );
    }

    public function privateGetFuncionarios(Array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            FuncionariosRepository::class,
            RestrictedFuncionarios::privateAccess[$userRole]
                ?? RestrictedFuncionarios::publicAccess,
            $this->warning
        );
    }
}
