<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UsersRepository.
 */
class UsersRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }


    public function createUser($data) {
        try {
            DB::beginTransaction();
            $user = $this->model->create($data);
            DB::commit();
            return $user;   
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function findUser($data) {
        $user = $this->model->where('email', $data['email'])->first();
        return $user;
    }

    public function findUserById($id) {
        return $this->model->find($id);
    }
}
