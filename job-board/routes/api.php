<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::post('/blog', [PostController::class, 'create']);
Route::delete('/blog', [PostController::class, 'delete']);

Route::post('/comment', [CommentController::class, 'create']);
