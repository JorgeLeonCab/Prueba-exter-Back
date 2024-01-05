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
            $data['baja'] = '0';
            $user = $this->model->create($data);
            DB::commit();
            return $user;   
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function findUser($email) {
        return $this->model->with('roles')->where('email', $email)->first();
    }

    public function findUserById($id) {
        return $this->model->find($id);
    }

    public function getUsers() {
        return $this->model->with('roles')->get();
    }

    public function deleteUser($id) {
        $user = $this->model->find($id);
        $user->update(['baja' => '1']);
        return $user;
    }
}
