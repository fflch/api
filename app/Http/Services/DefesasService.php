<?php

namespace App\Http\Services;

use App\Http\Repositories\DefesasRepository;
use App\Models\ResponseModel;

class DefesasService
{
    public function getDefesas(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $defesas = new DefesasRepository($validated);

        $count = $defesas->getCount();
        $data = $defesas->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
