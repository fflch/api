<?php

namespace App\Http\Controllers;

use App\Http\Requests\IcsRequest;
use App\Http\Resources\IcCollection;
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

        return new IcCollection($results, $primary, $joined);
    }
}
