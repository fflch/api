<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\PesquisadoresColabRepository;
use App\Utilities\RestrictedColumns\RestrictedPesquisadoresColab;

class PesquisadoresColabService
{
    public function publicGetPesquisadoresColab(Array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            PesquisadoresColabRepository::class,
            RestrictedPesquisadoresColab::publicAccess
        );
    }

    public function privateGetPesquisadoresColab(Array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            PesquisadoresColabRepository::class,
            RestrictedPesquisadoresColab::privateAccess[$userRole] 
                ?? RestrictedPesquisadoresColab::publicAccess
        );
    }
}
