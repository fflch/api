<?php

namespace App\Http\Controllers;

use App\Http\Requests\IniciacaoCientifica\SiicuspRequest;
use App\Http\Resources\IniciacaoCientifica\SiicuspResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class SiicuspController extends Controller
{
    public function index(SiicuspRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'trabalhos_siicusp';
        $joined = [
            'participantes' => 'participantes_siicusp',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = SiicuspResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
