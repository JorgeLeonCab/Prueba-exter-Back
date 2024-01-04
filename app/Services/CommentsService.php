<?php

namespace App\Services;

use App\Repositories\CommentsRepository;

/**
 * Class CommentsService.
 */
class CommentsService
{
    protected CommentsRepository $comments_repository;

    public function __construct(CommentsRepository $comments_repository)
    {
        $this->comments_repository = $comments_repository;
    }

    public function postComment($data){
        return $this->comments_repository->postComment($data);
    }

}
