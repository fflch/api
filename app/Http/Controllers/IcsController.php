<?php

namespace App\Http\Controllers;

use App\Http\Requests\IniciacaoCientifica\IcsRequest;
use App\Http\Resources\IniciacaoCientifica\IcResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class IcsController extends Controller
{
    public function index(IcsRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'ics';
        $joined = [
            'aluno' => 'pessoas',
            'orientador' => 'pessoas',
            'bolsas' => 'bolsas_ic'
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = IcResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
