<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success (array $data = [], string $message = '', int $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(array_merge([
            'success' => true,
            'message' => $message
        ], $data), $code);
    }

    public function error (string $message = '', array $data = [], int $code = 401): \Illuminate\Http\JsonResponse
    {
        return response()->json(array_merge([
            'success' => false,
            'message' => $message
        ], $data), $code);
    }
}
