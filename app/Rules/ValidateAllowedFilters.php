<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateAllowedFilters implements Rule
{
    private $allowedFilters, $unallowedFilter;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($allowedFilters)
    {
        $this->allowedFilters = $allowedFilters;
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
        foreach ($value as $filter => $x) {
            if (!$this->isFilterAllowed($filter)) {
                $this->unallowedFilter = $filter;
                return false;
            }
        }

        return true;
    }

    private function isFilterAllowed($filter)
    {
        return in_array($filter, $this->allowedFilters);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The filter '{$this->unallowedFilter}' cannot be applied or does not exist.";
    }
}
