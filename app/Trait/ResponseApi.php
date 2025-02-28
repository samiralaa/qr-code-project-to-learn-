<?php

namespace App\Traits;

trait ResponseApi
{
    public function successResponse($data, $code = 200, $message = "")
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function errorResponse($data, $code = 400, $message = "")
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
