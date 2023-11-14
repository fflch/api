<?php

namespace App\Http\Controllers;

use App\Http\Services\EstagiariosService;
use App\Http\Requests\PublicRequests\PublicEstagiariosRequest;
use App\Http\Requests\PrivateRequests\PrivateEstagiariosRequest;

class EstagiariosController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new EstagiariosService();
    }

    public function public(PublicEstagiariosRequest $request)
    {
        return response()->json(
            $this->service->publicGetEstagiarios(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivateEstagiariosRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetEstagiarios(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
