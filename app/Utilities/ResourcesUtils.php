<?php

namespace App\Utilities;

class ResourcesUtils
{
    private $restrictedColumns = [
        'hide' => [],
        'hash' => [],
    ];

    public function filterColumnsByRequestAndPermission(
        $pathToModelMapping,
        $responseData,
        $request
    ) {
        $restrictedColumns = $this->getModelsRestrictedColumns($pathToModelMapping);

        $responseData = $this->hideAndHashRestrictedColumns(
            $responseData,
            $restrictedColumns,
        );

        return $this->filterColumnsByRequest($responseData, $request);
    }


    public function getModelsRestrictedColumns($pathToModelMapping)
    {
        foreach ($pathToModelMapping as $path => $model) {
            $this->getModelRestrictedColumns(
                $model,
                $path
            );
        }

        return $this->restrictedColumns;
    }

    private function getModelRestrictedColumns($model, $path)
    {
        $modelInstance = new $model();
        $modelInstance->initializeModelAccessControl();

        $modelHiddenColumns = $modelInstance->getColumnsToBeHidden();
        $modelHashedColumns = $modelInstance->getColumnsToBeHashed();

        $pathParts = explode(".", $path);
        $pathParts = array_slice($pathParts, 1);

        // Hide
        $this->assembleModelRestrictions(
            $this->restrictedColumns['hide'],
            $modelHiddenColumns,
            $pathParts
        );

        // Hash
        $this->assembleModelRestrictions(
            $this->restrictedColumns['hash'],
            $modelHashedColumns,
            $pathParts
        );
    }

    function assembleModelRestrictions(&$columns, $modelColumns, $pathParts)
    {
        if ($modelColumns) {
            $modelColumns = array_fill_keys($modelColumns, null);
            $restrictedColumns = &$columns;
            foreach ($pathParts as $part) {
                if (!isset($restrictedColumns[$part])) {
                    $restrictedColumns[$part] = [];
                }
                $restrictedColumns = &$restrictedColumns[$part];
            }
            $restrictedColumns = $modelColumns;
        }
    }

    private function hideAndHashRestrictedColumns($data, $restrictedColumns)
    {
        foreach ($data as &$record) {
            $this->unsetRestrictedColumns($record, $restrictedColumns['hide']);
            $this->hashRestrictedColumns($record, $restrictedColumns['hash']);
        }

        return $data;
    }

    private function unsetRestrictedColumns(array &$record, array $unsetKeys)
    {
        $hideFunction = function ($record, $keysToUnset) {
            foreach ($keysToUnset as $keyToUnset => $arrayOrNull) {
                if (array_key_exists($keyToUnset, $record) && is_null($arrayOrNull)) {
                    unset($record[$keyToUnset]);
                }
            }
            return $record ?: null;
        };

        $this->manipulateColumns($record, $unsetKeys, $hideFunction);
    }

    private function hashRestrictedColumns(array &$record, array $hashKeys)
    {
        $hashFunction = function (&$record, $keysToHash) {
            foreach ($keysToHash as $keyToHash => $arrayOrNull) {
                if (array_key_exists($keyToHash, $record) && is_null($arrayOrNull)) {
                    $record[$keyToHash] = CommonUtils::hashValue($record[$keyToHash]);
                }
            }
            return $record;
        };

        $this->manipulateColumns($record, $hashKeys, $hashFunction);
    }

    private function manipulateColumns(
        array &$record,
        array $keys,
        callable $manipulateFn
    ) {
        foreach ($keys as $key => $value) {
            if (array_key_exists($key, $record)) {
                if (is_array($value)) {
                    $record[$key] = $this->manipulateNestedColumns(
                        $record[$key] ?? null,
                        $value,
                        $manipulateFn
                    );
                } else {
                    $record = $manipulateFn($record, [$key => null]);
                }
            }
        }
    }

    private function manipulateNestedColumns(
        $property,
        array $keysToManipulate,
        callable $manipulateFn
    ) {
        if (!CommonUtils::isMultidimensional($property)) {
            return $manipulateFn($property, $keysToManipulate);
        }

        foreach ($property as $index => $item) {
            foreach ($keysToManipulate as $keyToManipulate => $arrayOrNull) {
                if (is_array($arrayOrNull)) {
                    $this->manipulateColumns(
                        $item[$keyToManipulate],
                        $arrayOrNull,
                        $manipulateFn
                    );
                }
            }

            $manipulatedItem = $manipulateFn($item, $keysToManipulate);
            if (is_null($manipulatedItem)) {
                unset($property[$index]);
            } else {
                $property[$index] = $manipulatedItem;
            }
        }

        return $property;
    }

    private function filterColumnsByRequest(
        $data,
        $request
    ) {
        if (isset($request['columns'])) {
            $requestedColumns = $request['columns'];

            foreach ($data as &$record) {
                $record = $this->applyMask($record, $requestedColumns);
            }
        }

        return $data;
    }

    private function applyMask($record, $mask)
    {
        $result = [];

        foreach ($mask as $key => $value) {
            if (is_array($value)) {
                $result = $this->handleArrayValue($record, $key, $value, $result);
            } else {
                $result = $this->handleNonArrayValue($record, $key, $result);
            }
        }

        return $result;
    }

    private function handleArrayValue($record, $key, $value, $result)
    {
        if (array_key_exists($key, $record)) {
            $result[$key] = $this->applyMask($record[$key], $value);
        } elseif (CommonUtils::isArrayOrObject($record)) {
            foreach ($record as $index => $subrecord) {
                $result[$index][$key] = $this->applyMask($subrecord[$key], $value);
            }
        }

        return $result;
    }

    private function handleNonArrayValue($record, $key, $result)
    {
        if (array_key_exists($key, $record)) {
            $result[$key] = $record[$key];
        } elseif (CommonUtils::isArrayOrObject($record)) {
            foreach ($record as $index => $subrecord) {
                $result[$index][$key] = $subrecord[$key];
            }
        }

        return $result;
    }
}
