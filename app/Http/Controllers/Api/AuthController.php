<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\logInUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Services\UsersService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected UsersService $user_service;

    public function __construct(UsersService $user_service)
    {
        $this->user_service = $user_service;
    }


    public function registerUser(StoreUserRequest $request) {
        try {
            $data = $request->validated();
            $response = $this->user_service->createUser($data);
            return response()->json([
                'message' => 'Usuario creado satisfactoriamente!!', 
                'data' => $response
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    public function loginUser(logInUserRequest $request) {
        try {
            $data = $request->validated();
            $response = $this->user_service->loginUser($data);

            if($response == 'Correo o contraseña incorrectos') {
                return response()->json([
                    'message'=>$response
                ],401);
            }

            return response()->json([
                'message' => '', 
                'data' => $response
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }
}
