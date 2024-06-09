<?php

namespace App\Http\Controllers;

use App\Http\Resources\CulturaExtensao\CursoCCExResource;
use App\Models\CulturaExtensao\CursoCCEx;
use App\Models\CulturaExtensao\OferecimentoCCEx;
use Illuminate\Http\Request;

class CCExController extends RecordsController
{
    public function getCursos(Request $request)
    {
        $pathToModelMapping = [
            'curso_ccex' => CursoCCEx::class,
            'curso_ccex.oferecimentos' => OferecimentoCCEx::class,
        ];

        $resourceClass = CursoCCExResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }
}
