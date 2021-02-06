<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login.api');
    Route::post('/register',[AuthController::class, 'register'])->name('register.api');
    // Route::post('/logout', 'AuthController@logout')->name('logout.api');
});


Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.api');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->middleware('api.admin')->name('postssss');
});
