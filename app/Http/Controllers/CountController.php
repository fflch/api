<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CountService;

class CountController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CountService();
    }

    public function index(Request $request)
    {
        return response()->json(
            $this->service->getCount($request),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
