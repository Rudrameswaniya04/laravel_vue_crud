<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [App\Http\Controllers\LoginController::class,'login']);
Route::post('/register', [App\Http\Controllers\RegisterController::class,'register']);
Route::post('/logout', [App\Http\Controllers\LoginController::class,'logout'])->middleware('auth:api');


Route::get('users', [App\Http\Controllers\UserController::class,'index']);
Route::group(['prefix' => 'user'], function () {
    Route::post('add', [App\Http\Controllers\UserController::class,'add']);
    Route::get('edit/{id}', [App\Http\Controllers\UserController::class,'edit']);
    Route::post('update/{id}', [App\Http\Controllers\UserController::class,'update']);
    Route::delete('delete/{id}', [App\Http\Controllers\UserController::class,'delete']);
});