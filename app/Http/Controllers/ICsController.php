<?php

namespace App\Http\Controllers;

use App\Http\Services\ICsService;
use App\Http\Requests\PublicRequests\PublicICsRequest;
use App\Http\Requests\PrivateRequests\PrivateICsRequest;

class ICsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ICsService();
    }

    public function public(PublicICsRequest $request)
    {
        return response()->json(
            $this->service->publicGetICs(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivateICsRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetICs(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
