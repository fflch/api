<?php

namespace App\Http\Controllers;

use App\Http\Services\PosDocsService;
use App\Http\Requests\PosDocsRequest;

class PosDocsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PosDocsService();
    }

    public function index(PosDocsRequest $request)
    {
        return response()->json(
            $this->service->getPosDocs($request->validated()),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
