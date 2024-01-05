<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UsersService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UsersService $users_service;

    public function __construct(UsersService $users_service)
    {
        $this->users_service = $users_service;
    }

    public function index()
    {
        try {
            $response = $this->users_service->getUsers();
            return $response;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $id = $request->user['id'];
            $response = $this->users_service->deleteUser($id);
            return $response;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 
    }
}
