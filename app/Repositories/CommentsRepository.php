<?php

namespace App\Repositories;

use App\Models\Comments;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CommentsRepository.
 */
class CommentsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Comments::class;
    }

    public function postComment($data){
        $comment = $this->model->create([
            'user_id' => $data['user_id'],
            'post_id'=> $data['post_id'],
            'content' => $data['content']
        ]);
        return $comment;
    }
}
