<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LowercaseRequestParamsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $data = array_map('strtolower', $request->all());
        $request->merge($data);

        return $next($request);
    }
}
