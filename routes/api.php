<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

//Aqui é comentario
Route::post('comentario', [CommentController::class, 'store']);
Route::get('comentario', [CommentController::class, 'index']);
Route::get('comentario/{id}', [CommentController::class, 'show']);
Route::put('comentario/{id}', [CommentController::class, 'edit']);
Route::delete('comentario/{id}', [CommentController::class, 'destroy']);
//Aqui é post
Route::get('post', [PostController::class, 'index']);
Route::post('post', [PostController::class, 'store']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::put('post/{id}', [PostController::class, 'edit']);
Route::delete('post/{id}', [PostController::class, 'destroy']);