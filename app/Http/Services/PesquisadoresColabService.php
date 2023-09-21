<?php

namespace App\Http\Services;

use App\Http\Repositories\PesquisadoresColaboradoresRepository;
use App\Models\ResponseModel;

class PesquisadoresColaboradoresService
{
    public function getPesquisadoresColaboradores(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $pcs = new PesquisadoresColaboradoresRepository($validated);

        $count = $pcs->getCount();
        $data = $pcs->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
