<?php

namespace App\Http\Controllers;

use App\Http\Services\DocentesService;
use App\Http\Requests\PublicRequests\PublicDocentesRequest;
use App\Http\Requests\PrivateRequests\PrivateDocentesRequest;

class DocentesController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new DocentesService();
    }

    public function public(PublicDocentesRequest $request)
    {
        return response()->json(
            $this->service->publicGetDocentes(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivateDocentesRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetDocentes(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
