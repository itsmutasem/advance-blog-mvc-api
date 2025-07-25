<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', AboutController::class);
Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/job', [JobController::class, 'index']);

Route::resource('blog', PostController::class);

Route::resource('comments', CommentController::class);

Route::resource('tags', TagController::class);
Route::get('/tags/test-many', [TagController::class, 'testManyToMany']);
