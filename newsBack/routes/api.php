<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
// Route::post('')

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);

    Route::post('/upload', [ImageController::class, 'store']);

    Route::get('/profile', [UserController::class, 'getuser']);
    Route::post('/change-password', [UserController::class, 'changepassword']);
    Route::post('/new-password', [UserController::class, 'newpassword']);
    Route::post('/profile/update', [UserController::class, 'updateprofile']);
    Route::post('/logout', [UserController::class, 'logout']);
});

