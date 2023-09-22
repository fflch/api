<?php

namespace App\Http\Services;

use App\Http\Repositories\DocentesRepository;
use App\Models\ResponseModel;

class DocentesService
{
    public function getDocentes(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $docentes = new DocentesRepository($validated);

        $count = $docentes->getCount();
        $data = $docentes->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
