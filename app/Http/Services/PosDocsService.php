<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\PosDocsRepository;
use App\Utilities\RestrictedColumns\RestrictedPosDocs;

class PosDocsService
{
    public function publicGetPosDocs(Array $validated)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            PosDocsRepository::class,
            RestrictedPosDocs::publicAccess
        );
    }

    public function privateGetPosDocs(Array $validated, string $userRole)
    {
        return (new ServicesUtils)->buildResponse(
            $validated, 
            PosDocsRepository::class,
            RestrictedPosDocs::privateAccess[$userRole] 
                ?? RestrictedPosDocs::publicAccess
        );
    }
}
