<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CountService;

class CountController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CountService();
    }

    public function public(Request $request)
    {
        return response()->json(
            $this->service->fetchCount($request, 'public'),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(Request $request)
    {
        return response()->json(
            $this->service->fetchCount($request, 'private'),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
