<?php

namespace App\Http\Controllers;

use App\Http\Requests\Servidores\DocentesRequest;
use App\Http\Resources\RecordsCollection;
use App\Http\Resources\Servidores\DocenteResource;
use App\Http\Services\DataService;

class DocentesController extends Controller
{
    public function index(DocentesRequest $request)
    {
        $validatedRequest = $request->validated();
        $primary = 'docentes';
        $joined = [
            'pessoa' => 'pessoas',
            'designacoes' => 'designacoes_servidores'
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = DocenteResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
