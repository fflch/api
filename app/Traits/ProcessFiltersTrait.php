<?php

namespace App\Traits;

trait ProcessFiltersTrait
{
    public function scopeProcessPrimaryTableFilters(
        $query,
        $mappingClass,
        $requestedFilters
    ) {
        $this->processFilters(
            $query,
            $mappingClass,
            $requestedFilters
        );
    }

    public function scopeProcessJoinedTableFilters(
        $query,
        $mappingClass,
        $requestedFilters,
        $prefix
    ) {
        if (empty($requestedFilters)) return;

        $query->whereHas(
            $prefix,
            function ($query)
            use ($prefix, $mappingClass, $requestedFilters) {
                $this->processFilters(
                    $query,
                    $mappingClass,
                    $requestedFilters,
                    $prefix
                );
            }
        );
    }

    private function processFilters(
        $query,
        $mappingClass,
        $requestedFilters,
        $prefix = null
    ) {
        $modelRequestedFilters =
            self::getModelFilters($requestedFilters, $prefix);

        if (!is_null($modelRequestedFilters)) {
            $mapping = new $mappingClass;

            self::applyFilters(
                $query,
                $mapping->getAllowedFilters(),
                $modelRequestedFilters
            );
        }
    }

    private static function getModelFilters($array, $prefix = null)
    {
        return is_null($prefix) ? $array : ($array[$prefix] ?? []);
    }

    private static function applyFilters($query, $filterMap, $userFilters)
    {
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

    private static function applyNormalFilters($query, $column, $values)
    {
        $query->whereIn($column, $values);

        if (in_array("", $values, true)) {
            $query->orWhereNull($column);
        }
    }

    private static function applyYearFilters($query, $column, $values)
    {
        $query->orWhere(function ($query) use ($column, $values) {
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
