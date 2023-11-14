<?php

namespace App\Http\Controllers;

use App\Http\Services\FuncionariosService;
use App\Http\Requests\PublicRequests\PublicFuncionariosRequest;
use App\Http\Requests\PrivateRequests\PrivateFuncionariosRequest;

class FuncionariosController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new FuncionariosService();
    }

    public function public(PublicFuncionariosRequest $request)
    {
        return response()->json(
            $this->service->publicGetFuncionarios(
                $request->validated()
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function private(PrivateFuncionariosRequest $request)
    {
        $userRole = $request->user()->role;

        return response()->json(
            $this->service->privateGetFuncionarios(
                $request->validated(),
                $userRole
            ),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
