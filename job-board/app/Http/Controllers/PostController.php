<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        // Eloquent ORM -> Get all data
        $data = Post::cursorPaginate(10);
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog']);
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    function create()
    {
        Post::factory(10)->create();
        return response("Successful Creation", 201);
    }

    function delete($id)
    {
        Post::destroy($id);
        return response("Successful Deleted", 203);
    }
}
