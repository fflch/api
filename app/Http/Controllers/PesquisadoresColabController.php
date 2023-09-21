<?php

namespace App\Http\Controllers;

use App\Http\Services\PesquisadoresColabService;
use App\Http\Requests\PesquisadoresColabRequest;

class PesquisadoresColabController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PesquisadoresColabService();
    }

    public function index(PesquisadoresColabRequest $request)
    {
        return response()->json(
            $this->service->getPesquisadoresColab($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
