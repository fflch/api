<?php

namespace App\Http\Requests;

use App\Rules\ValidateAllowedColumns;
use App\Rules\ValidateAllowedFilters;
use App\Utilities\ValidationUtils;

abstract class BaseDataRequest extends ApiBaseRequest
{
    protected $primaryTable, $joinedTables, $tableMap;

    protected $joinedTablesPrefixes = [];
    protected $columnsRules = [];
    protected $filtersRules = [];

    public function __construct($primary, $joined)
    {
        $this->primaryTable = $primary;
        $this->joinedTables = $joined;
        $this->tableMap = include(__DIR__ . '/../../../config/tablemap.php');

        foreach ($this->joinedTables as $prefix => $joinedTable) {
            $this->joinedTablesPrefixes[] = $prefix;
        }

        $this->buildPrimaryTableRules();
        $this->buildJoinedTablesRules();
    }

    public function rules()
    {
        return array_merge(
            parent::rules(),
            $this->columnsRules,
            $this->filtersRules
        );
    }

    private function buildPrimaryTableRules()
    {
        $primaryMapping = new $this->tableMap[$this->primaryTable]['mapping'];
        $primaryColumns = $primaryMapping->getAllowedColumns();
        $primaryFilters = $primaryMapping->getAllowedFilters();

        // Define validation rules for columns
        $primaryColumnsValidator = new ValidateAllowedColumns([...$primaryColumns, ...$this->joinedTablesPrefixes]);
        $this->columnsRules["columns"] = ['sometimes', 'array', $primaryColumnsValidator];
        $this->columnsRules["columns.*"] = ['sometimes', 'in:1'];

        // Define validation rules for filters keys
        $primaryFiltersValidator = new ValidateAllowedFilters([...array_keys($primaryFilters), ...$this->joinedTablesPrefixes]);
        $this->filtersRules["filters"] = ['sometimes', 'array', $primaryFiltersValidator];

        // Assemble validation rules for filters values
        $primaryFiltersValuesRules = ValidationUtils::assembleFiltersValidationRules($primaryFilters);
        $this->filtersRules = array_merge($this->filtersRules, $primaryFiltersValuesRules);
    }

    private function buildJoinedTablesRules()
    {
        foreach ($this->joinedTables as $prefix => $joinedTable) {
            $joinedMapping = new $this->tableMap[$joinedTable]['mapping'];
            $joinedFilters = $joinedMapping->getAllowedFilters();
            $joinedColumns = $joinedMapping->getAllowedColumns();

            // Define validation rules for columns
            $joinedColumnsValidator = new ValidateAllowedColumns($joinedColumns);
            $this->columnsRules["columns.$prefix"] = ['sometimes', 'array', $joinedColumnsValidator];
            $this->columnsRules["columns.$prefix.*"] = ['sometimes', 'in:1'];

            // Define validation rules for filters keys
            $joinedFiltersValidator = new ValidateAllowedFilters(array_keys($joinedFilters));
            $this->filtersRules["filters.$prefix"] = ['sometimes', 'array', $joinedFiltersValidator];

            // Assemble validation rules for filters values
            $joinedFiltersValuesRules = ValidationUtils::assembleFiltersValidationRules($joinedFilters, $prefix);
            $this->filtersRules = array_merge($this->filtersRules, $joinedFiltersValuesRules);
        }
    }
}
