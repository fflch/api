<?php

namespace App\Http\Controllers;

use App\Http\Services\DefesasService;
use App\Http\Requests\DefesasRequest;

class DefesasController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new DefesasService();
    }

    public function index(DefesasRequest $request)
    {
        return response()->json(
            $this->service->getDefesas($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
