<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\DataService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Resources\RecordsCollection;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getResourceCollection($request, $primary, $joined, $resourceClass)
    {
        $validatedRequest = $request->validated();

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
