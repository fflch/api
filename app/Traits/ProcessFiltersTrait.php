<?php

namespace App\Traits;

use App\Utilities\CommonUtils;
use Illuminate\Database\Eloquent\Builder;

trait ProcessFiltersTrait
{
    public function scopeProcessRequestFilters(
        Builder $query,
        string $model,
        array $requestedFilters,
        string $path
    ) {
        $pathParts = explode('.', $path);

        $modelRequestedFilters =
            $this->getModelRequestedFilters($requestedFilters, $pathParts);

        $query->where(function ($query) use ($model, $modelRequestedFilters, $pathParts) {
            $this->buildNestedWhere(
                $query,
                $model,
                $modelRequestedFilters,
                $pathParts
            );
        });
    }

    private static function getModelRequestedFilters(
        array $requestedFilters,
        array $pathParts
    ) {
        if (count($pathParts) === 1) {
            return array_filter(
                $requestedFilters,
                fn ($value) => !CommonUtils::isMultidimensional($value)
            );
        }

        $pathParts = array_slice($pathParts, 1);
        $current = &$requestedFilters;

        foreach ($pathParts as $part) {
            if (!isset($current[$part])) {
                $current[$part] = [];
            }
            $current = &$current[$part];
        }

        return $current;
    }

    private function buildNestedWhere(
        Builder $query,
        string $model,
        array $modelRequestedFilters,
        array $pathParts
    ) {
        if (count($pathParts) === 1) {
            return $this->processFilters(
                $query,
                $model,
                $modelRequestedFilters
            );
        }

        if (count($pathParts) > 1) {
            $newPath = array_slice($pathParts, 1);
            return $query->whereHas(
                $pathParts[1],
                function ($query)
                use ($model, $modelRequestedFilters, $newPath) {
                    $this->buildNestedWhere(
                        $query,
                        $model,
                        $modelRequestedFilters,
                        $newPath
                    );
                }
            );
        }
    }

    private function processFilters(
        Builder $query,
        string $model,
        array $modelRequestedFilters
    ) {
        if (!is_null($modelRequestedFilters)) {
            $modelInstance = new $model;
            $modelInstance->initializeModelAccessControl();

            self::applyFilters(
                $query,
                $modelInstance->getAllowedFilters(),
                $modelRequestedFilters
            );
        }
    }

    private static function applyFilters(
        Builder $query,
        $filterMap,
        $userFilters
    ) {
        $filters = self::getFiltersByType($userFilters, $filterMap);

        foreach ($filters as $type => $columns) {
            foreach ($columns as $column => $values) {
                if ($type === 'normal') {
                    self::applyNormalFilters($query, $column, $values);
                } elseif ($type === 'year') {
                    self::applyYearFilters($query, $column, $values);
                }
            }
        }
    }

    private static function applyNormalFilters(
        Builder $query,
        $column,
        $values
    ) {
        $query->whereIn($column, $values);

        if (in_array("", $values, true)) {
            $query->orWhereNull($column);
        }
    }

    private static function applyYearFilters(
        Builder $query,
        $column,
        $values
    ) {
        $query->where(function ($query) use ($column, $values) {
            foreach ($values as $value) {
                $query->orWhereYear(
                    $column,
                    self::getOperator($value),
                    substr($value, -4)
                );
            }
        });
    }

    private static function getOperator($value)
    {
        $operatorMap = [
            'gte' => '>=',
            'lte' => '<=',
            'gt' => '>',
            'lt' => '<',
        ];

        foreach ($operatorMap as $substr => $operator) {
            if (str_starts_with($value, $substr)) {
                return $operator;
            }
        }

        return '=';
    }

    private static function getFiltersByType($requestedFilters, $filterMap)
    {
        $output = [];

        foreach ($requestedFilters as $filter => $value) {
            if (array_key_exists($filter, $filterMap)) {
                $alias = $filterMap[$filter]['with_table_alias'];
                $type = $filterMap[$filter]['type'];
                $output[$type][$alias] = $value;
            }
        }

        return $output;
    }
}
