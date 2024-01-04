<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\postCommentsRequest;
use App\Models\Comments;
use App\Services\CommentsService;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected CommentsService $comments_service;

    public function __construct(CommentsService $comments_service)
    {
        $this->comments_service = $comments_service;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // 
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
    public function store(postCommentsRequest $request)
    {
        try {
            $data = $request->validated();
            $response = $this->comments_service->postComment($data);

            return response()->json([
                'message' => 'Comentario creado satisfactoriamente!!', 
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
    public function show($id)
    {
        try {
            // return $id;
            $response = $this->comments_service->getCommentsPub($id);
            return $response;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
