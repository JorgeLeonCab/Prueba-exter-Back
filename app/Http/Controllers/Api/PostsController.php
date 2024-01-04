<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Posts;
use App\Models\User;
use App\Services\PostsService;
use Illuminate\Http\Client\Request;


class PostsController extends Controller
{
    protected PostsService $post_service;

    public function __construct(PostsService $post_service)
    {
        $this->post_service = $post_service;
    }

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        try {
            $response = $this->post_service->getPosts();
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
    public function store(CreatePostRequest $request)
    {
        try {
            $data = $request->validated();
            $response = $this->post_service->createPost($data);

            return response()->json([
                'message' => 'Post creado satisfactoriamente!!', 
                'data' => $response
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
