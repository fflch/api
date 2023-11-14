<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Utilities\WarningUtils;
use App\Http\Repositories\EstagiariosRepository;
use App\Utilities\RestrictedColumns\RestrictedEstagiarios;

class EstagiariosService
{
    protected $warning;

    public function __construct()
    {
        $this->warning = WarningUtils::vinculos;
    }

    public function publicGetEstagiarios(array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated,
            EstagiariosRepository::class,
            RestrictedEstagiarios::publicAccess,
            $this->warning
        );
    }

    public function privateGetEstagiarios(array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated,
            EstagiariosRepository::class,
            RestrictedEstagiarios::privateAccess[$userRole]
                ?? RestrictedEstagiarios::publicAccess,
            $this->warning
        );
    }
}
