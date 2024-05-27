<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiicuspRequest;
use App\Http\Resources\SiicuspCollection;
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

        return new SiicuspCollection($results, $primary, $joined);
    }
}
