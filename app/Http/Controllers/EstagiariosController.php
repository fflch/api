<?php

namespace App\Http\Controllers;

use App\Http\Services\EstagiariosService;
use App\Http\Requests\EstagiariosRequest;

class EstagiariosController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new EstagiariosService();
    }

    public function index(EstagiariosRequest $request)
    {
        return response()->json(
            $this->service->getEstagiarios($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
