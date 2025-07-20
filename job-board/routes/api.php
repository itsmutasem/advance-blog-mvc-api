<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::post('/blog', [PostController::class, 'create']);
Route::delete('/blog/{id}', [PostController::class, 'delete']);

Route::post('/comment', [CommentController::class, 'create']);

Route::post('/tag', [TagController::class, 'create']);
