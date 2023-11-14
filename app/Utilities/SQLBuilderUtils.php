<?php

namespace App\Utilities;

use Illuminate\Support\Facades\DB;

class SQLBuilderUtils
{
    public static function processFilters($query, $validated, $directColumns, $yearColumns)
    {
        foreach ($validated as $column => $value) {
            if (array_key_exists($column, $directColumns)) {
                if ($value == "") {
                    $query->whereNull($directColumns[$column]);
                } else {
                    $query->where($directColumns[$column], $value);
                }
            } elseif (array_key_exists($column, $yearColumns)) {
                $query->whereYear(
                    $yearColumns[$column],
                    self::getOperator($value),
                    substr($value, -4)
                );
            }
        }
    }

    public static function getOperator($value)
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

    public static function rangeDisplay($page, $limit, $totalRecords)
    {
        $limiteInferior = (($limit * ($page - 1)) + 1);
        $limiteSuperior = ($limit * $page);

        $display = $limiteInferior > $totalRecords
            ? "No records in this page"
            : ($totalRecords > $limiteSuperior
                ? $limiteInferior . "-" . $limiteSuperior
                : $limiteInferior . "-" . $totalRecords
            );

        return $display;
    }

    public static function SelectBuildHelper($query, $columns, $columnsToHide)
    {
        if (!is_null($columnsToHide)) {
            $columns = array_filter($columns, function ($value) use ($columnsToHide) {
                return !in_array($value, $columnsToHide);
            });
        }

        foreach ($columns as $key => $alias) {
            $query->addSelect("{$key} AS {$alias}");
        }

        return $query;
    }

    public static function findColumnsTableAlias($allcolumns, $filter)
    {
        $result = [];

        foreach ($allcolumns as $column => $alias) {
            if (in_array($alias, $filter)) {
                $result[$alias] = $column;
            }
        }

        return $result;
    }
}
