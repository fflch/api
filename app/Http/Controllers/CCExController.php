<?php

namespace App\Http\Controllers;

use App\Http\Requests\CulturaExtensao\CursosCCExRequest;
use App\Http\Resources\CulturaExtensao\CursoCCExResource;

class CCExController extends Controller
{
    public function getCursos(CursosCCExRequest $request)
    {
        $primary = 'cursos_ccex';
        $joined = [
            'oferecimentos' => 'oferecimentos_ccex'
        ];

        $resourceClass = CursoCCExResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }
}
