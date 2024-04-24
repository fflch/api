<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateAllowedColumns implements Rule
{
    private $allowedColumns, $unallowedColumn;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($allowedColumns)
    {
        $this->allowedColumns = $allowedColumns;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($value as $column => $boolOrArray) {
            if (
                !$this->isColumnAllowed($column) &&
                $this->isFetchingColumn($boolOrArray)
            ) {
                $this->unallowedColumn = $column;
                return false;
            }
        }

        return true;
    }

    private function isColumnAllowed($column)
    {
        return in_array($column, $this->allowedColumns);
    }

    private function isFetchingColumn($value)
    {
        return $value === "1" || is_array($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The column '{$this->unallowedColumn}' cannot be fetched or does not exist.";
    }
}
