<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController;

class AuthController extends BaseApiController
{
    public function registerUser() {
        return request()->all();
    }
}
