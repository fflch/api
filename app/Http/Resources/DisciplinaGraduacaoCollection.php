<?php

namespace App\Http\Resources;

use App\Utilities\ResourcesUtils;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DisciplinaGraduacaoCollection extends ResourceCollection
{
    private $primary, $joined;

    public function __construct($resource, $primary, $joined)
    {
        parent::__construct($resource);
        $this->resource = $this->collectResource($resource);

        $this->primary = $primary;
        $this->joined = $joined;
    }

    public function toArray($request)
    {
        $responseData = $this->collection->map->toArray([])->all();

        $restrictedColumns = ResourcesUtils::getRestrictedColumns(
            $this->primary,
            $this->joined
        );

        $filteredResponseData =
            ResourcesUtils::filterColumnsByRequestAndPermission(
                $responseData,
                $restrictedColumns,
                $request,
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
