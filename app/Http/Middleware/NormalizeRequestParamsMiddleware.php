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

        $request->replace($cleanedInput);

        return $next($request);
    }
}
