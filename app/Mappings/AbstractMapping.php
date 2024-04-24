<?php

namespace App\Mappings;

abstract class AbstractMapping
{
    protected $allowedColumnsAndFilters;

    public function __construct()
    {
        $userRole = auth('sanctum')->user()->role ?? 'public';

        $accessLevels = $this->getAccessLevels();
        $columnsAndFilters = $this->getColumnsAndFilters();

        foreach ($columnsAndFilters as $key => $value) {
            if (
                in_array($key, $accessLevels[$userRole]['HIDE']) ||
                in_array($key, $accessLevels[$userRole]['HASH'])
            ) {
                unset($columnsAndFilters[$key]);
            }
        }

        $this->allowedColumnsAndFilters = $columnsAndFilters;
    }

    abstract public static function getAccessLevels();

    abstract public static function getColumnsAndFilters();

    public function getAllowedColumns()
    {
        return array_keys($this->allowedColumnsAndFilters);
    }

    public function getAllowedFilters()
    {
        $allowedFilters = [];
        foreach ($this->allowedColumnsAndFilters as $column) {
            foreach ($column['filters'] as $filter) {
                $filterName = $filter['name'];
                unset($filter['name']);

                $allowedFilters[$filterName] = $filter;
            }
        }

        return $allowedFilters;
    }
}
