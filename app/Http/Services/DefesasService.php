<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\DefesasRepository;

class DefesasService
{
    public function getDefesas(Array $validated)
    {
        return ServicesUtils::buildResponse(
            $validated, 
            DefesasRepository::class
        );
    }
}
