<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        // Eloquent ORM -> Get all data
        $data = Post::all();
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog']);
    }
}
