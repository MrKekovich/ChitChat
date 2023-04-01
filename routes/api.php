<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', 'App\Http\Controllers\PostController')->except('create', 'edit');
//Route::middleware('auth:sanctum')->group(function () {
Route::resource('chats', 'App\Http\Controllers\Chat\ChatController')->except('create', 'edit');
Route::resource('chats/{chat}/messages', 'App\Http\Controllers\MessageController')->except('create', 'edit', 'index');
Route::resource('images', 'App\Http\Controllers\ImageController')->except('create', 'edit');
//});

