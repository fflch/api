<?php

namespace App\Http\Controllers;

use App\Http\Services\DocentesService;
use App\Http\Requests\DocentesRequest;

class DocentesController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new DocentesService();
    }

    public function index(DocentesRequest $request)
    {
        return response()->json(
            $this->service->getDocentes($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
