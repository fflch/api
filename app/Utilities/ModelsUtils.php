<?php

namespace App\Utilities;

class ModelsUtils
{
    public static function getModelFilters($array, $prefix = null)
    {
        return is_null($prefix)
            ? $array
            : (isset($array[$prefix])
                ? $array[$prefix]
                : []);
    }
}
