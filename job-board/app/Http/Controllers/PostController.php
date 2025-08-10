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
        $post->body = $request->input('body');
        $post->published = $request->has('published');
        $post->user_id = auth()->id();

        $post->save();

        return redirect('/blog')->with('store', 'Post created successfully!');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            return redirect('/blog')->with('unauthorized-update', 'You can not edit posts that are not created by you!');
        }
        return view('post.edit', ['post' => $post ,'pageTitle' => 'Blog - Edit Post: ' . $post->title]);
    }

    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            return redirect('/blog')->with('unauthorized-update', 'You can not edit posts that are not created by you!');
        }
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published = $request->has('published');

        $post->save();
        return redirect('/blog')->with('update', 'Post updated successfully!');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/blog')->with('delete', 'Post deleted successfully!');
    }
}
