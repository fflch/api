<?php

namespace App\Http\Resources;

use App\Utilities\ResourcesUtils;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecordsCollection extends ResourceCollection
{
    private $pathToModelMapping, $validatedRequest;

    public function __construct($resource, $validatedRequest, $pathToModelMapping, $resourceClass)
    {
        $this->collection = $resource->mapInto($resourceClass);
        $this->resource = $resource->setCollection($this->collection);
        $this->validatedRequest = $validatedRequest;
        $this->pathToModelMapping = $pathToModelMapping;
    }

    public function toArray($request)
    {
        $responseData = $this->collection->map->toArray([])->all();

        $filteredResponseData =
            (new ResourcesUtils())->filterColumnsByRequestAndPermission(
                $this->pathToModelMapping,
                $responseData,
                $this->validatedRequest,
            );

        return [
            'total_records' => $this->total(),
            'current_page' => $this->currentPage(),
            'per_page' => $this->perPage(),
            'first_item' => $this->firstItem(),
            'last_item' => $this->lastItem(),
            'data' => $filteredResponseData,
        ];
    }
}
