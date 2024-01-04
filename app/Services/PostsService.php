<?php

namespace App\Services;

use App\Repositories\PostsRepository;

/**
 * Class PostsService.
 */
class PostsService
{
    protected PostsRepository $post_repository;

    public function __construct(PostsRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    public function getPosts() {
        return $this->post_repository->getPosts();
    }

    public function createPost($data) {
        return $this->post_repository->createPost($data);
    }
}
