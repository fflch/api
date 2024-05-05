<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocentesRequest;
use App\Http\Resources\DocenteCollection;
use App\Http\Services\DataService;

class DocentesController extends Controller
{
    public function index(DocentesRequest $request)
    {
        $validatedRequest = $request->validated();
        $primary = 'docentes';
        $joined = ['pessoa' => 'pessoas'];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        return new DocenteCollection($results, $primary, $joined);
    }
}
