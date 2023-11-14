<?php

namespace App\Http\Controllers;

use App\Http\Services\PosDocsService;
use App\Http\Requests\PublicRequests\PublicPosDocsRequest;
use App\Http\Requests\PrivateRequests\PrivatePosDocsRequest;

class PosDocsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PosDocsService();
    }

    public function public(PublicPosDocsRequest $request)
    {
        return response()->json(
            $this->service->publicGetPosDocs(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivatePosDocsRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetPosDocs(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
