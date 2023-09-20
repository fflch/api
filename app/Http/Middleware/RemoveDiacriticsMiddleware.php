<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveDiacriticsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();

        $diacritics = [
            'á' => 'a',
            'à' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
        ];

        foreach ($input as $key => $value) {
            $input[$key] = strtr($value, $diacritics);
        }

        $request->replace($input);

        return $next($request);
    }
}
