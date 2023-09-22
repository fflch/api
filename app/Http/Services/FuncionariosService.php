<?php

namespace App\Http\Services;

use App\Http\Repositories\FuncionariosRepository;
use App\Models\ResponseModel;

class FuncionariosService
{
    public function getFuncionarios(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $funcionarios = new FuncionariosRepository($validated);

        $count = $funcionarios->getCount();
        $data = $funcionarios->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
