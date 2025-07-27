<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::latest()->cursorPaginate(10);
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog']);
    }

    public function create()
    {
        return view('post.create', ['pageTitle' => 'Blog - Create New Post']);
    }

    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = $request->input('body');
        $post->published = $request->has('published');

        $post->save();

        return redirect('/blog');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    public function edit(string $id)
    {
        return view('post.edit', ['pageTitle' => 'Blog - Edit Post']);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
