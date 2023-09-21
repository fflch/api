<?php

namespace App\Utilities;
use Illuminate\Support\Facades\DB;

class SQLBuilderUtils
{
    public static function processFilters($query, $validated, $directColumns, $yearColumns)
    {
        foreach($validated as $column => $value) {
            if (array_key_exists($column, $directColumns)) {
                if ($value == "") {
                    $query->whereNull($directColumns[$column]);
                }
                else {
                    $query->where($directColumns[$column], $value);
                }
            }
            elseif (array_key_exists($column, $yearColumns)) {
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

    public static function singleHashSQL($input, $pepper, $alias = null, $size = 32)
    {
        $add = isset($alias) ? " AS $alias" : null;

        return DB::raw(
            "LEFT(UPPER(SHA2(CONCAT($input, '$pepper'), 256)), $size)" . 
            $add
        );
    }

    public static function doubleHashSQL($input, $pepper1, $pepper2, $alias = null, $size = 32)
    {
        $add = isset($alias) ? " AS $alias" : null;

        return DB::raw(
            "LEFT(UPPER(SHA2(CONCAT('$pepper1', SHA2(CONCAT($input, '$pepper2'), 256)), 256)), $size)" . 
            $add
        );
    }

    public static function getPepperHashes()
    {
        return [
            $_ENV['HASH_PEPPER1'],
            $_ENV['HASH_PEPPER2'],
        ];
    }
}
