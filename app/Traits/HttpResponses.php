<?php

namespace App\Traits;

trait HttpResponses
{
    public function error(string $message, int $status, string $error = null, array $data = [])
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'error' => $error,
            'data' => $data
        ], $status);
    }
}
