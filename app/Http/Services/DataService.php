<?php

namespace App\Http\Services;

use App\Utilities\CommonUtils;
use Exception;
use App\Utilities\SQLBuilderUtils;

class DataService
{
    public static function getFilteredData(
        array $pathToModelMapping,
        array $request
    ) {
        $query = self::initPrimaryModelQuery($pathToModelMapping);

        $requestedFilters = $request['filters'] ?? [];
        if (!empty($requestedFilters)) {
            self::filterQuery($query, $pathToModelMapping, $requestedFilters);
        }

        return SQLBuilderUtils::paginate($query, $request);
    }

    private static function initPrimaryModelQuery(array $pathToModelMapping)
    {
        $primaryModel = self::getPrimaryModel($pathToModelMapping);
        return $primaryModel::query();
    }

    private static function getPrimaryModel(array $pathToModelMapping)
    {
        $matchedModels = array_filter($pathToModelMapping, function ($model, $path) {
            return strpos($path, '.') === false;
        }, ARRAY_FILTER_USE_BOTH);

        $matchedModelsCount = count($matchedModels);

        if ($matchedModelsCount === 0) {
            throw new Exception("No matching table found for primary table.");
        }

        if ($matchedModelsCount > 1) {
            throw new Exception("Multiple matches found for primary table.");
        }

        return reset($matchedModels);
    }

    private static function filterQuery($query, $pathToModelMapping, $requestedFilters)
    {
        foreach ($pathToModelMapping as $path => $model) {
            $nestedKeysSequence = array_slice(explode('.', $path), 1);
            if (CommonUtils::validateNestedArrayKey(
                $nestedKeysSequence,
                $requestedFilters
            )) {
                $query->processRequestFilters(
                    $model,
                    $requestedFilters,
                    $path,
                );
            }
        }
    }
}
