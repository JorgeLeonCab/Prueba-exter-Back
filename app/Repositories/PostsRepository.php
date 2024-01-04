<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class PostsRepository.
 */
class PostsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Posts::class;
    }

    public function getPosts() {
        $posts = $this->model->with('user')->get();
        Log::debug($posts);
        return $posts;
    }

    public function createPost($data) {
        $user = User::find($data['user_id']);
        $post = $this->model->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $user->id
        ]);
        return $post;
    }
}
