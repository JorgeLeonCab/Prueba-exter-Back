<?php

namespace App\Services;

use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Bridge\UserRepository;

/**
 * Class UsersService.
 */
class UsersService
{
    protected UsersRepository $user_repository;
    public function __construct(UsersRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }


    public function createUser($data) {
        $data['password'] = Hash::make($data['password']);
        $user = $this->user_repository->createUser($data);
        $accessToken = $user->createToken('Token name');
        $user->assignRole('User');
        return [
            'user' => $user,
            'access_token' => $accessToken,
        ];
    }

    public function loginUser($data) {
        $user = $this->user_repository->findUser($data);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return 'Correo o contraseña incorrectos';
        }
        $accessToken = $user->createToken('authToken')->accessToken;
        Log::debug($accessToken);
        return [
            'user' => $user,
            'access_token' => $accessToken,
        ];
    }

    public function logOut($id) {
        $user = $this->user_repository->findUserById($id);
        $user->tokens()->delete();
        return $user;
    }
}
