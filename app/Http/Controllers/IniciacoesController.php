<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Http\Services\IniciacoesService;

class IniciacoesController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new IniciacoesService();
    }

    public function index(PaginationRequest $request)
    {
        return response()->json(
            $this->service->getIniciacoes($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
