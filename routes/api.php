<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\ExcelController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\bajaMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
Route::post('/logout/{id}', [AuthController::class, 'logOut'])->name("logout");
Route::get('/export-users', [ExcelController::class, 'exportUsersExcel'])->name('export-user-excel');

Route::middleware(bajaMiddleware::class)->group(function () {

    Route::post('/login', [AuthController::class, 'loginUser'])->name("login");
    
    Route::middleware('auth:api')->group(function () {
        Route::resource('/post', PostsController::class)->names('post');
        Route::resource('/comments', CommentsController::class)->names('comment');
    });
    
    Route::prefix('/admin/{user_id}')->group(function () {
        Route::middleware(['auth:api', adminMiddleware::class])->group(function () {
            Route::resource('/user', UserController::class)->names('user');
        });
});
});