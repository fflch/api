<?php

namespace App\Http\Controllers;

use App\Http\Services\FuncionariosService;
use App\Http\Requests\FuncionariosRequest;

class FuncionariosController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new FuncionariosService();
    }

    public function index(FuncionariosRequest $request)
    {
        return response()->json(
            $this->service->getFuncionarios($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
