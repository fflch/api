<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\PosDocsRepository;

class PosDocsService
{
    public function getPosDocs(Array $validated)
    {
        return ServicesUtils::buildResponse(
            $validated, 
            PosDocsRepository::class
        );
    }
}
