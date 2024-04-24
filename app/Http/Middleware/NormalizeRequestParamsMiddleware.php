<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Utilities\CommonUtils;

class NormalizeRequestParamsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();

        $lowercasedInput = CommonUtils::arrayToLower($input);
        $cleanedInput = CommonUtils::removeArrayDiacritics($lowercasedInput);

        if (
            isset($cleanedInput['filters'])
            && is_array($cleanedInput['filters'])
        ) {
            self::convertNonArrayValuesToArray($cleanedInput['filters']);
        }

        $request->replace($cleanedInput);

        return $next($request);
    }

    private function convertNonArrayValuesToArray(&$array)
    {
        foreach ($array as &$value) {
            if (!is_array($value)) {
                $value = [$value];
            } elseif (array_values($value) !== $value) {
                // checks if $value is an associative array (not a list)
                $value = self::convertNonArrayValuesToArray($value);
            }
        }
    
        return $array;
    }
}
