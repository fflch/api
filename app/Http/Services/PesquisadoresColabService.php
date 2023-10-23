<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\PesquisadoresColabRepository;

class PesquisadoresColabService
{
    public function getPesquisadoresColab(Array $validated)
    {
        return ServicesUtils::buildResponse(
            $validated, 
            PesquisadoresColabRepository::class
        );
    }
}
