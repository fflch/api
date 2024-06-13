<?php

namespace App\Http\Requests;

use App\Rules\ValidateAllowedColumns;
use App\Rules\ValidateAllowedFilters;

class RecordsRequest extends ApiBaseRequest
{
    private $pathToModelMapping;
    private $pathHierarchy = [];
    private $columnsRules = [];
    private $filtersRules = [];

    public function __construct($pathToModelMapping)
    {
        $this->pathToModelMapping = $pathToModelMapping;

        foreach ($pathToModelMapping as $path => $model) {
            $this->assemblePathHierarchy($path);
        }

        $this->initializeRules();
    }

    public function rules()
    {
        return array_merge(
            parent::rules(),
            $this->columnsRules,
            $this->filtersRules
        );
    }

    private function initializeRules()
    {
        foreach ($this->pathToModelMapping as $path => $model) {
            $modelInstance = new $model();
            $modelInstance->initializeModelAccessControl();
            $columns = $modelInstance->getAllowedColumns();
            $filters = $modelInstance->getAllowedFilters();

            $pathParts = explode('.', $path);
            $nodeChildren = $this->accessPathHierarchy($pathParts);

            $requestPath = count($pathParts) <= 1 ? "" : "." . implode(".", array_slice($pathParts, 1));

            $this->setColumnsValidationRules($columns, $nodeChildren, $requestPath);
            $this->setFiltersValidationRules($filters, $nodeChildren, $requestPath);
        }
    }

    private function assemblePathHierarchy($path)
    {
        $pathParts = explode('.', $path);
        $temp = &$this->pathHierarchy;
        foreach ($pathParts as $index => $part) {
            if (!isset($temp[$part])) {
                $temp[$part] = [];
            }
            $temp = &$temp[$part];
        }
    }

    private function accessPathHierarchy($pathKeys)
    {
        $currentNode = $this->pathHierarchy;
        foreach ($pathKeys as $pathKey) {
            if (isset($currentNode[$pathKey])) {
                $currentNode = $currentNode[$pathKey];
            }
        }
        return $currentNode;
    }


    private function setColumnsValidationRules($columns, $tableContext, $requestPath)
    {
        $columnsValidator = new ValidateAllowedColumns([...$columns, ...array_keys($tableContext)]);
        $this->columnsRules["columns" . "$requestPath"] = ['sometimes', 'array', $columnsValidator];
        $this->columnsRules["columns" . "$requestPath.*"] = ['sometimes', 'in:1'];
    }

    private function setFiltersValidationRules($filters, $tableContext, $requestPath)
    {
        $joinedFiltersValidator = new ValidateAllowedFilters([...array_keys($filters), ...array_keys($tableContext)]);
        $this->filtersRules["filters" . "$requestPath"] = ['sometimes', 'array', $joinedFiltersValidator];

        $joinedFiltersValuesRules = $this->assembleFiltersValidationRules($filters, $requestPath);
        $this->filtersRules = array_merge($this->filtersRules, $joinedFiltersValuesRules);
    }

    private function assembleFiltersValidationRules($filters, $requestPath = null)
    {
        $filtersRules = [];

        foreach ($filters as $filterName => $filterInfo) {
            $validationRule = $filterInfo['validation'];

            $filterPath = is_null($requestPath)
                ? "filters" . "$filterName"
                : "filters" . "$requestPath.$filterName";

            $filtersRules["$filterPath.*"] =
                ['sometimes', ...(is_array($validationRule)
                    ? $validationRule
                    : [$validationRule]
                )];
        }

        return $filtersRules;
    }
}
