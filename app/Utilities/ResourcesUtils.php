<?php

namespace App\Utilities;

class ResourcesUtils
{
    public static function getRestrictedColumns($primaryTable, $joinedTables)
    {
        $restrictedColumns = [
            'hide' => [],
            'hash' => [],
        ];

        $tableMap = include(__DIR__ . '/../../config/tablemap.php');

        self::getPrimaryTableRestrictedCols(
            $tableMap[$primaryTable]['mapping'],
            $restrictedColumns
        );

        foreach ($joinedTables as $prefix => $joinedTable) {
            self::getJoinedTableRestrictedCols(
                $tableMap[$joinedTable]['mapping'],
                $prefix,
                $restrictedColumns
            );
        }

        return $restrictedColumns;
    }

    private static function getPrimaryTableRestrictedCols($mapping, &$restrictedColumns)
    {
        $tableHiddenColumns = (new $mapping)->getColumnsToBeHidden();
        $tableHashedColumns = (new $mapping)->getColumnsToBeHashed();

        $restrictedColumns['hide'] += array_fill_keys($tableHiddenColumns, null);
        $restrictedColumns['hash'] += array_fill_keys($tableHashedColumns, null);
    }

    private static function getJoinedTableRestrictedCols($mapping, $prefix, &$restrictedColumns)
    {
        $tableHiddenColumns = (new $mapping)->getColumnsToBeHidden();
        $tableHashedColumns = (new $mapping)->getColumnsToBeHashed();

        $restrictedColumns['hide'][$prefix] = $tableHiddenColumns;
        $restrictedColumns['hash'][$prefix] = $tableHashedColumns;
    }

    public static function filterColumnsByRequestAndPermission(
        $responseData,
        $restrictedColumns,
        $request
    ) {
        $responseData = self::hideAndHashRestrictedColumns(
            $responseData,
            $restrictedColumns,
        );

        return self::filterColumnsByRequest($responseData, $request);
    }

    private static function filterColumnsByRequest(
        $data,
        $request
    ) {
        if (isset($request->all()['columns'])) {
            $requestedColumns = $request->all()['columns'];

            foreach ($data as &$record) {
                $record = self::applyMask($record, $requestedColumns);
            }
        }

        return $data;
    }

    private static function applyMask($record, $mask)
    {
        $result = [];

        foreach ($mask as $key => $value) {
            if (is_array($value)) {
                if (isset($record[$key]) && CommonUtils::isArrayOrObject($record[$key])) {
                    $result[$key] = self::applyMask($record[$key], $value);
                }
            } else {
                if (array_key_exists($key, $record)) {
                    $result[$key] = $record[$key];
                } elseif (CommonUtils::isArrayOrObject($record)) {
                    foreach ($record as $r) {
                        $result[][$key] = $r[$key];
                    }
                }
            }
        }

        return $result;
    }

    private static function hideAndHashRestrictedColumns($data, $restrictedColumns)
    {
        foreach ($data as &$record) {
            self::hashRestrictedColumns($record, $restrictedColumns['hash']);
            self::unsetRestrictedColumns($record, $restrictedColumns['hide']);
        }

        return $data;
    }

    private static function unsetRestrictedColumns(array &$record, array $unsetKeys)
    {
        self::manipulateColumns($record, $unsetKeys, function (&$array, $keys) {
            foreach ($keys as $v) {
                if (array_key_exists($v, $array)) {
                    unset($array[$v]);
                }
            }
        });
    }

    private static function hashRestrictedColumns(array &$record, array $hashKeys)
    {
        self::manipulateColumns($record, $hashKeys, function (&$array, $keys) {
            foreach ($keys as $v) {
                if (array_key_exists($v, $array)) {
                    $array[$v] = CommonUtils::hashValue($array[$v]);
                }
            }
        });
    }

    private static function manipulateColumns(
        array &$record,
        array $keys,
        callable $manipulateFn
    ) {
        foreach ($keys as $key => $value) {
            if (array_key_exists($key, $record)) {
                if (is_array($value)) {
                    $record[$key] = self::manipulateNestedColumns($record[$key] ?? null, $value, $manipulateFn);
                } else {
                    $manipulateFn($record, [$key]);
                }
            }
        }
    }

    private static function manipulateNestedColumns(
        $property,
        array $keys,
        callable $manipulateFn
    ) {
        if (CommonUtils::isMultidimensional($property)) {
            foreach ($property as &$item) {
                $manipulateFn($item, $keys);
            }
        } else {
            $manipulateFn($property, $keys);
        }

        return $property;
    }
}
