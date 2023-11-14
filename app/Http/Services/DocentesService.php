<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Utilities\WarningUtils;
use App\Http\Repositories\DocentesRepository;
use App\Utilities\RestrictedColumns\RestrictedDocentes;

class DocentesService
{
    protected $warning;

    public function __construct()
    {
        $this->warning = WarningUtils::vinculos;
    }

    public function publicGetDocentes(Array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            DocentesRepository::class,
            RestrictedDocentes::publicAccess,
            $this->warning
        );
    }

    public function privateGetDocentes(Array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            DocentesRepository::class,
            RestrictedDocentes::privateAccess[$userRole]
                ?? RestrictedDocentes::publicAccess,
            $this->warning
        );
    }
}
