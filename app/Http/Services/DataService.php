<?php

namespace App\Http\Services;

use App\Utilities\SQLBuilderUtils;

class DataService
{
    public static function getFilteredData(
        string $primary,
        array $joined,
        array $request
    ) {
        $tableMap = include(__DIR__ . '/../../../config/tablemap.php');

        $model = $tableMap[$primary]['model'];
        $query = $model::query();

        $requestedFilters = $request['filters'] ?? [];

        if (!empty($requestedFilters)) {
            $query->processPrimaryTableFilters(
                $tableMap[$primary]['mapping'],
                $requestedFilters
            );

            foreach ($joined as $prefix => $joinedTable) {
                $query->processJoinedTableFilters(
                    $tableMap[$joinedTable]['mapping'],
                    $requestedFilters,
                    $prefix,
                );
            }
        }

        return SQLBuilderUtils::paginate($query, $request);
    }
}
