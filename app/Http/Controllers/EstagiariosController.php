<?php

namespace App\Http\Controllers;

use App\Http\Requests\Servidores\EstagiariosRequest;
use App\Http\Resources\RecordsCollection;
use App\Http\Resources\Servidores\EstagiarioResource;
use App\Http\Services\DataService;

class EstagiariosController extends Controller
{
    public function index(EstagiariosRequest $request)
    {
        $validatedRequest = $request->validated();
        $primary = 'estagiarios';
        $joined = ['pessoa' => 'pessoas'];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = EstagiarioResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
