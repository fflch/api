<?php

namespace App\Http\Controllers;

use App\Http\Services\DataService;
use App\Utilities\ErrorUtils;
use App\Http\Resources\RecordsCollection;
use App\Http\Requests\RecordsRequest;
use Illuminate\Support\Facades\Validator;

class RecordsController extends Controller
{
    protected function getResourceCollection($request, $pathToModelMapping, $resourceClass)
    {
        $validatedRequest = $this->validateRequest($request, $pathToModelMapping);

        $results = DataService::getFilteredData(
            $pathToModelMapping,
            $validatedRequest
        );

        return new RecordsCollection(
            $results,
            $validatedRequest,
            $pathToModelMapping,
            $resourceClass
        );
    }

    protected function validateRequest($request, $pathToModelMapping)
    {
        $rules = (new RecordsRequest($pathToModelMapping))->rules();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $details = $validator->errors();
            ErrorUtils::generateJsonErrorResponse(400, "Bad Request", $details);
        }

        return $validator->validated();
    }
}
