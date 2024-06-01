<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosCCExRequest;
use App\Http\Resources\CursoCCExCollection;
use App\Http\Services\DataService;

class CursosCCExController extends Controller
{
    public function index(CursosCCExRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'cursos_ccex';
        $joined = [
            'oferecimentos' => 'oferecimentos_ccex'
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        return new CursoCCExCollection($results, $primary, $joined);
    }
}
