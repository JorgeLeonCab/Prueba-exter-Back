<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function returnInfoSuccess($data, $message = null, $code = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    public function returnInfoError($message = 'Error', $code = 400)
    {
        return response()->json([
            'data' => null,
            'message' => $message,
        ], $code);
    }

    public function returnInfoUnauthorized($message = 'Unauthorized', $code = 401)
    {
        return response()->json([
            'data' => null,
            'message' => $message,
        ], $code);
    }

    public function returnInfoNotFound($message = 'Not Found', $code = 404)
    {
        return response()->json([
            'data' => null,
            'message' => $message,
        ], $code);
    }

    public function returnInfoServerError($message = 'Server Error', $code = 500)
    {
        return response()->json([
            'data' => null,
            'message' => $message,
        ], $code);
    }
}