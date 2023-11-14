<?php

namespace App\Http\Controllers;

use App\Http\Services\PesquisadoresColabService;
use App\Http\Requests\PublicRequests\PublicPesquisadoresColabRequest;
use App\Http\Requests\PrivateRequests\PrivatePesquisadoresColabRequest;

class PesquisadoresColabController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PesquisadoresColabService();
    }

    public function public(PublicPesquisadoresColabRequest $request)
    {
        return response()->json(
            $this->service->publicGetPesquisadoresColab(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivatePesquisadoresColabRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetPesquisadoresColab(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
