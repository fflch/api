<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\DefesasRepository;
use App\Utilities\RestrictedColumns\RestrictedDefesas;

class DefesasService
{
    public function publicGetDefesas(Array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            DefesasRepository::class,
            RestrictedDefesas::publicAccess
        );
    }

    public function privateGetDefesas(Array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            DefesasRepository::class,
            RestrictedDefesas::privateAccess[$userRole] 
                ?? RestrictedDefesas::publicAccess
        );
    }
}
