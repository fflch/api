<?php

namespace App\Http\Services;

use App\Http\Repositories\EstagiariosRepository;
use App\Models\ResponseModel;

class EstagiariosService
{
    public function getEstagiarios(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $estagiarios = new EstagiariosRepository($validated);

        $count = $estagiarios->getCount();
        $data = $estagiarios->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
