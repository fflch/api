<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\ICsRepository;
use App\Utilities\RestrictedColumns\RestrictedICs;

class ICsService
{
    public function publicGetICs(Array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated,
            ICsRepository::class,
            RestrictedICs::publicAccess
        );
    }

    public function privateGetICs(Array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated,
            ICsRepository::class,
            RestrictedICs::privateAccess[$userRole]
                ?? RestrictedICs::publicAccess
        );
    }
}
