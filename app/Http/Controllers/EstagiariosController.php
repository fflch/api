<?php

namespace App\Http\Controllers;

use App\Http\Requests\Servidores\EstagiariosRequest;
use App\Http\Resources\Servidores\EstagiarioCollection;
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

        return new EstagiarioCollection($results, $primary, $joined);
    }
}
