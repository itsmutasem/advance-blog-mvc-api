<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Http\Requests\BlogPostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return redirect('/blog');
    }

    public function create()
    {
        return redirect('/blog');
    }

    public function store(BlogCommentRequest $request)
    {
        $post = Post::findOrFail($request->input('post_id'));

        $comment = new Comment();

        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect("/blog/{$post->id}")->with('store', 'Comment added successfully!');
    }

    public function show(string $id)
    {
        return redirect('/blog');
    }

    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', ['comment' => $comment, 'pageTitle' => 'Blog - Edit Comment']);
    }

    public function update(BlogCommentRequest $request, string $id)
    {
        $post = Post::findOrFail($request->input('post_id'));

        $comment = Comment::findOrFail($id);
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');

        $comment->save();
        return redirect("/blog/{$post->id}")->with('update', 'Comment updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
