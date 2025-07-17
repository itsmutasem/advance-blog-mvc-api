<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        // Eloquent ORM -> Get all data
        $data = Post::simplePaginate(5);
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog']);
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    function create()
    {
        $post = Post::create([
            'title' => 'My find Unique post',
            'body' => 'This is to test find',
            'author' => 'Mutasem',
            'published' => true
        ]);
        return redirect('/blog');
    }

    function delete()
    {
        Post::destroy(3);
    }
}
