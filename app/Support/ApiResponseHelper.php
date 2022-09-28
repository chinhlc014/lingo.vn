<?php

namespace App\Support;

class ApiResponseHelper
{
    /**
     * function description
     *
     * @param null $data
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = null, $message = 'success', $statusCode = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'statusCode' => $statusCode,
            ], $statusCode);
    }
}
