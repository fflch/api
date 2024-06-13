<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class UnsetCollectionMetaAndLinks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $response = $next($request);
            $data = $response->getData(true);

            if (isset($data['links'])) {
                unset($data['links']);
            }

            if (isset($data['meta'])) {
                unset($data['meta']);
            }

            return $response->setData($data);
        } catch (Exception $e) {
            return $next($request);
        }
    }
}
