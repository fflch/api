<?php

namespace App\Http\Controllers;

use App\Http\Services\ICsService;
use App\Http\Requests\ICsRequest;

class ICsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ICsService();
    }

    public function index(ICsRequest $request)
    {
        return response()->json(
            $this->service->getICs($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
