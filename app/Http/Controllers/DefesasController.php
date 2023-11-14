<?php

namespace App\Http\Controllers;

use App\Http\Services\DefesasService;
use App\Http\Requests\PublicRequests\PublicDefesasRequest;
use App\Http\Requests\PrivateRequests\PrivateDefesasRequest;

class DefesasController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new DefesasService();
    }

    public function public(PublicDefesasRequest $request)
    {
        return response()->json(
            $this->service->publicGetDefesas(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivateDefesasRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetDefesas(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
