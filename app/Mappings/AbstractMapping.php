<?php

namespace App\Mappings;

abstract class AbstractMapping
{
    protected $allowedColumnsAndFilters, $fullyAllowedColumnsAndFilters, $toHide, $toHash;

    public function __construct()
    {
        $userRole = auth('sanctum')->user()->role ?? 'public';

        $accessLevels = $this->getAccessLevels();
        $columnsAndFilters = $this->getColumnsAndFilters();

        $this->toHide = $accessLevels[$userRole]['HIDE'];
        $this->toHash = $accessLevels[$userRole]['HASH'];

        $this->allowedColumnsAndFilters = $this->filterColumnsAndFilters(
            $columnsAndFilters,
            $this->toHide
        );
    }

    private function filterColumnsAndFilters($columnsAndFilters, $filters)
    {
        foreach ($columnsAndFilters as $key => $value) {
            if (in_array($key, $filters)) {
                unset($columnsAndFilters[$key]);
            }
        }

        return $columnsAndFilters;
    }

    abstract public static function getAccessLevels();

    abstract public static function getColumnsAndFilters();

    public function getAllowedColumns()
    {
        return array_keys($this->allowedColumnsAndFilters);
    }

    public function getAllowedFilters()
    {
        // also filter out those columns that will be hashed
        $fullyAllowedColumnsAndFilters = $this->filterColumnsAndFilters(
            $this->allowedColumnsAndFilters,
            $this->toHash
        );

        $allowedFilters = [];
        foreach ($fullyAllowedColumnsAndFilters as $column) {
            foreach ($column['filters'] as $filter) {
                $filterName = $filter['name'];
                unset($filter['name']);

                $allowedFilters[$filterName] = $filter;
            }
        }

        return $allowedFilters;
    }

    public function getColumnsToBeHashed()
    {
        return $this->toHash;
    }

    public function getColumnsToBeHidden()
    {
        return $this->toHide;
    }
}
