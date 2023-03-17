<?php

namespace App\Http\Services;

use App\Http\Repositories\IniciacoesRepository;

class IniciacoesService
{
    public function getIniciacoes(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        if ($limit == 0 || $page == 0) {
            return IniciacoesRepository::getIniciacoesCount($page, $limit);
        }

        return IniciacoesRepository::getIniciacoesData($page, $limit);
    }
}
