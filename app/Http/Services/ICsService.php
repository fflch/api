<?php

namespace App\Http\Services;

use App\Http\Repositories\ICsRepository;
use App\Models\ResponseModel;

class ICsService
{
    public function getICs(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $ics = new ICsRepository($validated);

        $count = $ics->getCount();
        $data = $ics->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
