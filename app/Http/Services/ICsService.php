<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\ICsRepository;

class ICsService
{
    public function getICs(Array $validated)
    {
        return ServicesUtils::buildResponse(
            $validated, 
            ICsRepository::class
        );
    }
}
